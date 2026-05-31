<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\EventBookingModel;

class Events extends BaseController
{
    public function index()
    {
        $model = new EventModel();
        $data['events'] = $model->orderBy('id', 'DESC')->findAll();
        
        return view('admin/events/index', $data);
    }

    public function add()
    {
        return view('admin/events/add');
    }

    public function save()
    {
        $model = new EventModel();

        $data = [
            'title'           => $this->request->getPost('title'),
            'description'     => $this->request->getPost('description'),
            'event_date'      => $this->request->getPost('event_date'),
            'event_time'      => $this->request->getPost('event_time'),
            'location'        => $this->request->getPost('location'),
            'total_seats'     => $this->request->getPost('total_seats') ?: 0,
            'available_seats' => $this->request->getPost('total_seats') ?: 0,
            'status'          => $this->request->getPost('status') ?: 'active',
        ];

        $uploadPath = ROOTPATH . 'public/imgs/events';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $newName = $imageFile->getRandomName();
            $imageFile->move($uploadPath, $newName);
            $data['image'] = 'imgs/events/' . $newName;
        }

        $model->insert($data);

        return redirect()->to('/admin/events')->with('success', 'Event added successfully.');
    }

    public function delete($id)
    {
        $model = new EventModel();
        $event = $model->find($id);
        
        if($event){
            if(!empty($event['image']) && file_exists(FCPATH . $event['image'])){
                unlink(FCPATH . $event['image']);
            }
            $model->delete($id);
        }

        return redirect()->to('/admin/events')->with('success', 'Event deleted successfully.');
    }

    public function bookings()
    {
        $model = new EventBookingModel();
        
        // Join with events table to get event title
        $builder = $model->builder();
        $builder->select('event_bookings.*, events.title as event_title');
        $builder->join('events', 'events.id = event_bookings.event_id', 'left');
        $builder->orderBy('event_bookings.id', 'DESC');
        
        $data['bookings'] = $builder->get()->getResultArray();
        
        return view('admin/events/bookings', $data);
    }

    public function approveBooking($id)
    {
        $bookingModel = new EventBookingModel();
        $eventModel = new EventModel();

        $booking = $bookingModel->find($id);
        if ($booking && $booking['status'] !== 'confirmed') {
            $bookingModel->update($id, [
                'status' => 'confirmed',
                'approved_by' => session()->get('admin_id'),
                'approved_at' => date('Y-m-d H:i:s')
            ]);

            // Deduct available seat
            $event = $eventModel->find($booking['event_id']);
            if ($event && $event['available_seats'] > 0) {
                $eventModel->update($event['id'], [
                    'available_seats' => $event['available_seats'] - 1
                ]);
            }
        }

        return redirect()->to('/admin/events/bookings')->with('success', 'Booking approved successfully.');
    }

    public function rejectBooking($id)
    {
        $bookingModel = new EventBookingModel();
        $booking = $bookingModel->find($id);
        
        if ($booking && $booking['status'] !== 'cancelled') {
            $bookingModel->update($id, ['status' => 'cancelled']);
            
            // If it was already confirmed, return the seat
            if ($booking['status'] === 'confirmed') {
                $eventModel = new EventModel();
                $event = $eventModel->find($booking['event_id']);
                if ($event) {
                    $eventModel->update($event['id'], [
                        'available_seats' => $event['available_seats'] + 1
                    ]);
                }
            }
        }

        return redirect()->to('/admin/events/bookings')->with('success', 'Booking rejected successfully.');
    }
}
