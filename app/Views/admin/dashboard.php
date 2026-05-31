<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>

<style>
/* Dashboard Styles matching the screenshot structure */
body {
    background-color: #f4f6f9; /* Subtle grey background */
}

.main-content {
    margin: 100px 30px 30px 330px; /* Adjust left margin for sidebar (approx 300px) + top nav */
    transition: 0.5s;
}

@media (max-width: 1170px) {
    .main-content {
        margin-left: 15px;
        margin-right: 15px;
    }
}

.card-box {
    background: #ffffff;
    border-radius: 8px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    border: 1px solid rgba(0,0,0,0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025);
}

.card-box p {
    margin: 0 0 10px 0;
    color: #6b7280;
    font-size: 15px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.card-box h3 {
    margin: 0;
    font-size: 32px;
    color: #111827;
    font-weight: 700;
}

/* Specific colors for different stat cards to make them pop subtly if needed */
.card-box.primary p { color: #f44336; } /* Matching the red theme */

.table-box {
    background: #ffffff;
    border-radius: 8px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    border: 1px solid rgba(0,0,0,0.05);
}

.table-box h4 {
    margin-top: 0;
    margin-bottom: 24px;
    font-size: 18px;
    color: #111827;
    font-weight: 600;
    border-bottom: 2px solid #f3f4f6;
    padding-bottom: 15px;
}

.custom-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.custom-table th {
    background-color: #f9fafb;
    color: #4b5563;
    font-weight: 600;
    padding: 14px 16px;
    text-align: left;
    font-size: 14px;
    border-bottom: 1px solid #e5e7eb;
}

.custom-table td {
    padding: 16px;
    color: #374151;
    font-size: 14px;
    border-bottom: 1px solid #e5e7eb;
    vertical-align: middle;
}

.custom-table tr:last-child td {
    border-bottom: none;
}

.custom-table tbody tr:hover {
    background-color: #f9fafb;
}

.badge {
    padding: 6px 12px;
    font-size: 12px;
    font-weight: 500;
    border-radius: 20px;
}
.badge.bg-success { background-color: #10b981; color: white; }
.badge.bg-warning { background-color: #f59e0b; color: white; }

</style>

<div class="main-content">

    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="card-box primary">
                <p>Total Members</p>
                <h3><?= $total_members ?></h3>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card-box">
                <p>Pending Requests</p>
                <h3><?= $pending_members ?></h3>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card-box">
                <p>Total Donation</p>
                <h3>₹<?= number_format($total_donation) ?></h3>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card-box">
                <p>Student Leads</p>
                <h3><?= $student_leads ?></h3>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card-box">
                <p>Upcoming Events</p>
                <h3><?= $events ?></h3>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card-box">
                <p>New Contacts</p>
                <h3><?= $contacts ?></h3>
            </div>
        </div>
    </div>

    <div class="table-box">
        <h4>Recent Member Applications</h4>
        
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>City</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Rohit Kumar</strong></td>
                        <td>9876543210</td>
                        <td>Raipur</td>
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>18 Apr</td>
                    </tr>
                    <tr>
                        <td><strong>Suman Devi</strong></td>
                        <td>9988776655</td>
                        <td>Bilaspur</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>18 Apr</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?= view('admin/layout/footer') ?>