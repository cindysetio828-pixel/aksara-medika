</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('statusChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Dalam Proses', 'Disetujui', 'Ditolak'],
        datasets: [{
            data: [
                <?= $total_proses; ?>,
                <?= $total_disetujui; ?>,
                <?= $total_ditolak; ?>
            ],
            backgroundColor: [
                '#F4C95D',
                '#2FAE9B',
                '#D96C75'
            ],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>
</body>
</html>