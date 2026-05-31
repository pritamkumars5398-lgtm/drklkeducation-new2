<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\YoutubeVideoModel;

class YoutubeVideos extends BaseController
{
    public function index()
    {
        $model = new YoutubeVideoModel();
        $data['videos'] = $model->orderBy('id', 'DESC')->findAll();
        return view('admin/youtube_videos/index', $data);
    }

    public function add()
    {
        return view('admin/youtube_videos/add');
    }

    public function save()
    {
        $model = new YoutubeVideoModel();

        $data = [
            'title'        => $this->request->getPost('title'),
            'youtube_link' => $this->request->getPost('youtube_link'),
            'status'       => $this->request->getPost('status'),
        ];

        $model->insert($data);
        return redirect()->to('/admin/youtube-videos')->with('success', 'Video added successfully');
    }

    public function edit($id)
    {
        $model = new YoutubeVideoModel();
        $data['video'] = $model->find($id);
        if (!$data['video']) {
            return redirect()->to('/admin/youtube-videos')->with('error', 'Video not found');
        }
        return view('admin/youtube_videos/edit', $data);
    }

    public function update($id)
    {
        $model = new YoutubeVideoModel();
        $data = [
            'title'        => $this->request->getPost('title'),
            'youtube_link' => $this->request->getPost('youtube_link'),
            'status'       => $this->request->getPost('status'),
        ];

        $model->update($id, $data);
        return redirect()->to('/admin/youtube-videos')->with('success', 'Video updated successfully');
    }

    public function delete($id)
    {
        $model = new YoutubeVideoModel();
        $model->delete($id);
        return redirect()->to('/admin/youtube-videos')->with('success', 'Video deleted successfully');
    }
}
