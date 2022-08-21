<script src="<?php echo base_url(); ?>assets/main/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/main/js/jquery.seat-charts.js"></script>
<section style="margin-top: 6%;">
    <div class="content">
        <div class="main">
            <h2><?= $cinema->nama_bioskop ?></h2>
            <div class="demo">
                <div id="seat-map">
                    <div class="front">SCREEN</div>
                </div>
                <div class="booking-details">
                    <ul class="book-left">
                        <li>Movie </li>
                        <li>Time </li>
                        <li>Tickets</li>
                        <li>Total</li>
                        <li>Seats :</li>
                    </ul>
                    <ul class="book-right">
                        <li>: <?= $movie->judul_film ?></li>
                        <li>: <?= $schedule->tgl_tayang ?></li>
                        <li>: <span id="counter">0</span></li>
                        <li>: <b><i>Rp. </i><span id="total">0</span></b></li>
                    </ul>
                    <div class="clear"></div>
                    <!-- <ul id="selected-seats" class="scrollbar scrollbar1"></ul> -->

                    <form action="<?php echo base_url(); ?>book/process" method="POST">
                        <input type="hidden" name="id" value="<?= $schedule->id ?>">
                        <input type="hidden" name="total" id="total_price" value="0">
                        <input type="text" name="nomor_kursi" id="selected-seats" readonly>
                        <input type="submit" class="checkout-button" value="Book Now"></input>
                    </form>
                    <div id="legend"></div>
                </div>
                <div style="clear:both"></div>
            </div>

            <script type="text/javascript">
                var price = <?= $schedule->ticket_price ?>; //price
                var jumlah_kursi = <?= $schedule->jumlah_kursi ?>;
                var booked = <?= json_encode($order) ?? 'null' ?>;
                console.log(booked);
                $(document).ready(function() {
                    var $cart = $('#selected-seats'), //Sitting Area
                        $counter = $('#counter'), //Votes
                        $total = $('#total'); //Total money

                    var row = jumlah_kursi / 10;
                    var arrMap = [];
                    var count = 0;
                    for (let index = 0; index < row; index++) {
                        if (count === jumlah_kursi) {
                            break
                        }
                        let a = ''
                        for (let j = 0; j < 10; j++) {
                            a = a.concat('a')
                            count++
                        }
                        arrMap.push(a)
                    }
                    console.log(arrMap);

                    var selectedArr = []
                    var sc = $('#seat-map').seatCharts({
                        map: arrMap,
                        naming: {
                            top: false,
                            getLabel: function(character, row, column) {
                                return column;
                            }
                        },
                        legend: { //Definition legend
                            node: $('#legend'),
                            items: [
                                ['a', 'available', 'Available'],
                                ['a', 'unavailable', 'Sold'],
                                ['a', 'selected', 'Selected']
                            ]
                        },
                        click: function() { //Click event
                            if (this.status() == 'available') { //optional seat
                                selectedArr.push((this.settings.row + 1) + '_' + this.settings.label)

                                let text = selectedArr.join(',')

                                $('#selected-seats').val(text)

                                $counter.text(sc.find('selected').length + 1);
                                $total.text(recalculateTotal(sc) + price);
                                $('#total_price').val($total.text())

                                return 'selected';
                            } else if (this.status() == 'selected') { //Checked
                                //Update Number
                                $counter.text(sc.find('selected').length - 1);
                                //update totalnum
                                $total.text(recalculateTotal(sc) - price);
                                $('#total_price').val($total.text())

                                //Delete reservation
                                let d = selectedArr.indexOf((this.settings.row + 1) + '_' + this.settings.label);
                                if (d > -1) {
                                    selectedArr.splice(d, 1);
                                }
                                let text = selectedArr.join(',')

                                $('#selected-seats').val(text)
                                //optional
                                return 'available';
                            } else if (this.status() == 'unavailable') { //sold
                                return 'unavailable';
                            } else {
                                return this.style();
                            }
                        }
                    });
                    //sold seat
                    if (booked != null) {
                        kursi = booked.nomor_kursi.split(',')
                        arr = []
                        kursi.forEach(e => {
                            arr.push(e)
                        });
                        sc.get(arr).status('unavailable');
                    }
                    // sc.get(['1_2', '4_4', '4_5', '6_6', '6_7', '8_5', '8_6', '8_7', '8_8', '10_1', '10_2']).status('unavailable');

                });
                //sum total money
                function recalculateTotal(sc) {
                    var total = 0;
                    sc.find('selected').each(function() {
                        total += price;
                    });

                    return total;
                }
            </script>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/main/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/main/js/scripts.js"></script>
</section>