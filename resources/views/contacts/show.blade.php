@extends('layouts.app')

@section('title', 'Contact Details')

@section('content')
    <div class="container">
        <h2 class="mb-4">Contact Details</h2>

        <!-- Contact Information Card -->
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                    <!-- Contact Photo (Left Column) -->
                    <div class="col-md-4 text-center">
                        @if ($contact->photo)
                            <img src="{{ asset('storage/'.$contact->photo) }}" width="200" class="img-thumbnail rounded-circle shadow-sm mb-3" alt="Contact Photo">
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-user-circle fa-6x text-muted"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Personal Info (Middle Column) -->
                    <div class="col-md-4">
                        <h4 class="card-title">Personal Information</h4>
                        <p><strong>First Name:</strong> {{ $contact->first_name }}</p>
                        <p><strong>Middle Name:</strong> {{ $contact->middle_name ?? 'N/A' }}</p>
                        <p><strong>Last Name:</strong> {{ $contact->last_name }}</p>
                        <p><strong>Email:</strong> {{ $contact->email ?? 'N/A' }}</p>
                        <p><strong>Mobile Number:</strong> {{ $contact->mobile_number ?? 'N/A' }}</p>
                        <p><strong>Landline Number:</strong> {{ $contact->landline_number ?? 'N/A' }}</p>
                        <p><strong>Notes:</strong> {{ $contact->notes ?? 'N/A' }}</p>
                    </div>

                    <!-- Additional Information (Right Column) -->
                    <div class="col-md-4">
                        <h4 class="card-title">Additional Information</h4>
                        <p><strong>Date Added:</strong> {{ $contact->created_at->format('d M Y') }}</p>
                        <p><strong>Last Updated:</strong> {{ $contact->updated_at->format('d M Y') }}</p>
                        <p><strong>Total Views:</strong> <span class="badge bg-info">{{ $totalViews }}</span></p>
                        <p><strong>Today's Views:</strong> <span class="badge bg-warning">{{ $todayViews }}</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Views Per Day Graph -->
        <hr>
        <h3>Views Per Day (Last 7 Days)</h3>
        <div style="width: 100%; height: 300px;">
            <canvas id="viewsChart"></canvas>
        </div>

        <!-- Back to Contacts Button -->
        <hr>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Contacts</a>
    </div>
@endsection

@section('scripts')
    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('viewsChart').getContext('2d');
    var viewsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels) !!}, // Dates
            datasets: [{
                label: 'Views',
                data: {!! json_encode($chartData) !!}, // Views
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        // Force y-axis to display whole numbers
                        stepSize: 1, // Set the step size to 1
                        callback: function(value) {
                            if (Math.floor(value) === value) { // Only display whole numbers
                                return value;
                            }
                        }
                    }
                }
            }
        }
    });
});
    </script>
@endsection
