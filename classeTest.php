

<script src="http://handsontable.com/lib/jquery.min.js"></script>
<script src="http://handsontable.com/dist/jquery.handsontable.full.js"></script>
<link rel="stylesheet" media="screen" href="http://handsontable.com/dist/jquery.handsontable.full.css">
<link rel="stylesheet" media="screen" href="http://handsontable.com/demo/css/samples.css?20140401">

<style type="text/css">
body {background: white; margin: 20px;}
h2 {margin: 20px 0;}
</style>



<div id="example" class="handsontable"></div>



<script>
    
    $(document).ready(function () {

  var data = [
    ["", "Maserati", "Mazda", "Mercedes", "Mini", "Mitsubishi"],
    ["2009", 0, 2941, 4303, 354, 5814],
    ["2010", 5, 2905, 2867, 412, 5284],
    ["2011", 4, 2517, 4822, 552, 6127],
    ["2012", 2, 2422, 5399, 776, 4151]
  ];
  
  $('#example').handsontable({
    data: data,
    minSpareRows: 1,
    colHeaders: true,
    contextMenu: true
  });
  
  
  function bindDumpButton() {
      $('body').on('click', 'button[name=dump]', function () {
        var dump = $(this).data('dump');
        var $container = $(dump);
        console.log('data of ' + dump, $container.handsontable('getData'));
      });
    }
  bindDumpButton();

});

</script>