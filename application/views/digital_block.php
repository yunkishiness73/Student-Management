<script>

  function digitalBlock() {
    var d = new Date();
    h = d.getHours();
    m = d.getMinutes();
    s = d.getSeconds();
    suff = (24-h) < 12 ? ' PM' : ' AM';
    month = ['January','February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    curMonth = month[d.getMonth()];

    if( d.getDate() < 10)
      date = '0' + d.getDate() + " " + curMonth +  " " +d.getFullYear();
    else
      date = d.getDate() + " " + curMonth +  " " +d.getFullYear();

    if(s < 10) { s = '0' + s;}
    if(m < 10) { m = '0' + m;}
    if(h < 10) {h = '0' + h;}

    times = date + ' ' + h + ":" + m + ":" +s + suff;
    var object = document.getElementById('digital-block');
    object.innerHTML = times;
    setTimeout(digitalBlock, 1000);

  }

  digitalBlock();

</script>