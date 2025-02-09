@extends('layouts.app')

@section('title', 'Analytics')

@section('content')

  <div class="container">
        <h2 class="mb-4">Analytics</h2>

        <div style="width: 100%; height: 300px;">
             <canvas id="contactChart" width="400" height="200"></canvas>
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
  
    var ctx = document.getElementById('contactChart').getContext('2d');
    var contactChart = new Chart(ctx, {
        type: 'bar', // You can use other chart types like 'line', 'pie', etc.
        data: {
            labels: @json($viewModel->contacts->pluck('contact_id')), // Directly get contact_id without concatenation
            datasets: [{
                label: 'Total Views',
                data: @json($viewModel->contacts->pluck('total_views')), // Directly get total_views
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Bar color
                borderColor: 'rgba(54, 162, 235, 1)', // Border color
                borderWidth: 1
            }]
        },
        options: {
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

    // Now, update the labels with "Contact " prefix using JavaScript
    contactChart.data.labels = contactChart.data.labels.map(function(label) {
        return "Contact " + label; // Add "Contact " prefix to each label
    });
    contactChart.update(); // Update the chart with modified labels
</script>



@endsection