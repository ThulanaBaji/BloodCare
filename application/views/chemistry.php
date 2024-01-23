<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chemistry</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.7.0.js' ?>"></script>

</head>
<body>
    <div class="h-screen w-screen p-11 text-gray-700">
        <div class="h-full w-full rounded-lg shadow flex flex-col gap-4 items-center justify-center bg-gradient-to-tr from-emerald-100 to-blue-200">
            <div class="slider flex gap-4 text-gray-700 font-semibold text-sm items-center">
                <p class="rounded w-20 inline-flex justify-center py-1 bg-black/10">NaOH</p>
                <input type="range" name="" step="0.01" id="nslider" class="w-64" onchange="changed(this)">
                <p class="nslider-val w-11">30%</p>
            </div>

            <div class="slider flex gap-4 text-gray-700 font-semibold text-sm items-center">
                <p class="rounded w-20 inline-flex justify-center items-baseline py-1 bg-black/10">Ba(OH)<sub>2</sub></p>
                <input type="range" name="" step="0.01" id="bslider" class="w-64">
                <p class="bslider-val w-11">30%</p>
            </div>

            <div class="result p-6 relative bg-green-100 rounded border mt-6">
                <span class="text-xs font-bold absolute top-2 left-2">H<sub>2</sub>SO<sub>4</sub></span>
                <p class="hresult p-2 font-mono">25.4g</p>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){
        $('#nslider').attr('value', 48);
    })

    function changed(e){
        $('.nslider-val').text($(e).val() + '%');

        $('#bslider').val(100 - parseInt($(e).val()));
        $('.bslider-val').text(100 - parseFloat($(e).val()) + '%');

        var n = $(e).val();
        var b = 100 - n;

        var ninitialmass = 3.31 * n / 100;
        var binitialmass = 3.31 * b / 100;

        var ninitialmol = ninitialmass / 40;
        var binitialmol = binitialmass / 171;

        var nmolinselected = ninitialmol / 250 * 25;
        var bmolinselected = binitialmol / 250 * 25;

        var neededhmol = nmolinselected * 1/2 + bmolinselected;
        var neededhvol  =neededhmol * 1000/25;

        $('p.hresult').text(neededhmol);
        $('p.hresult').html($('p.hresult').text() + ' mol<br>' + neededhvol + ' moldm<sup>-3</sup>');
    }
</script>