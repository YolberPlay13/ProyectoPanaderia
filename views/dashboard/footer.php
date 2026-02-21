        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">© Gestor de tienda 2025</div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- JS del template SB Admin -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?php echo base_url('js/scripts.js'); ?>"></script>

<!-- Inicialización DataTable con labels en español -->
<script>
    window.addEventListener('DOMContentLoaded', event => {
        const datatablesSimple = document.getElementById('datatablesSimple');
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple, {
                labels: {
                    placeholder: "Buscar...",
                    perPage: "Registros ",
                    noRows: "No se encontraron registros",
                    info: "Mostrando {start} a {end} de {rows} registros"
                }
            });
        }
    });
</script>
</body>
</html>
