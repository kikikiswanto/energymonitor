              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Time</th>
                  <th>Current</th>
                  <th>Volt</th>
                  <th>Power</th>
                  <th>Source</th>
                </tr>
                </thead>
                <tbody >
                <?php 
                foreach ($electrics as $row) {
                 ?>
                <tr>
                  <td><?= $row->el_time; ?></td>
                  <td><?= $row->i; ?> A</td>
                  <td><?= $row->v; ?> V</td>
                  <td><?= $this->electric_m->get_power($row->el_time); ?> W</td>
                  <td><?= $row->sc_code; ?> - <?= $row->sc_name; ?></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
              <script src="<?= $PATH . '/assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
              <script type="text/javascript">
                $("#example1").DataTable({
                  'order' : [[0, 'desc']]
                });
              </script>