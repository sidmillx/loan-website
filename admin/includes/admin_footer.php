<!-- Closing the main content container -->
</div> <!-- End of content -->

<!-- Bootstrap 5 JS Bundle (for modals, dropdowns, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jQuery (required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<!-- DataTables Library for interactive tables -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<!-- Custom JavaScript -->
<script src="../script.js"></script>

<!-- DataTables Initialization -->
<script>
  $(document).ready(function () {
    $('#myTable').DataTable();               // Initializes DataTable on the #myTable element
    new DataTable('table.display');          // Initializes DataTable on any table with class "display"
  });
</script>

<!-- Chart.js Library for Data Visualization -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Data Visualization Scripts -->
<script>
    // Bar Chart: Monthly Loan Applications
    new Chart(document.getElementById('loanApplicationsChart'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Loan Applications',
                data: [150, 200, 180, 220, 300, 250],
                backgroundColor: '#4e73df'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });

    // Pie Chart: Loan Status Breakdown
    new Chart(document.getElementById('loanStatusChart'), {
        type: 'pie',
        data: {
            labels: ['Approved', 'Rejected', 'Pending'],
            datasets: [{
                data: [865, 120, 32],
                backgroundColor: ['#1cc88a', '#e74a3b', '#f6c23e']
            }]
        }
    });

    // Line Chart: Membership Growth Over Time
    new Chart(document.getElementById('membershipGrowthChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Members',
                data: [100, 150, 180, 220, 260, 300],
                borderColor: '#36b9cc',
                fill: false,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: true } }
        }
    });
</script>


<!-- Notifications Javascript -->
 <script>
    function fetchNotifications() {
    fetch('../admin/notifications/fetch_notifications.php')
        .then(response => response.json())  // Fix: Removed semicolon here
        .then(data => {
            const list = document.getElementById('notificationList');
            const count = document.getElementById('notificationCount');
            
            list.innerHTML = '';
            count.textContent = data.length;

            data.forEach(notification => {
                const item = document.createElement('li');
                item.innerHTML = `${notification.title} - ${notification.message} 
                                  <button onclick="markAsRead(${notification.id})">Mark as Read</button>`;
                list.appendChild(item);
            });
        })
        .catch(error => {
            console.error('Error fetching notifications:', error);  // Added error handling
        });
}

function markAsRead(id) {
    fetch('../admin/notifications/update_notification.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${id}`
    }).then(() => fetchNotifications())
    .catch(error => {
        console.error('Error marking notification as read:', error);  // Added error handling
    });
}


function toggleNotifications() {
    const panel = document.getElementById('notificationPanel');
    panel.style.display = panel.style.display === 'none' ? 'block' : 'none';
}

setInterval(fetchNotifications, 5000); // Refresh every 5 seconds
window.onload = fetchNotifications;

 </script>

</body>
</html>
