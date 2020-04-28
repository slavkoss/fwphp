<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(PRIVATE_PATH . 'hdr.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php 
            echo '/zinc/img/mvc_M_V_and_M_C_V_data_flow.jpg';
            //echo url_for('images/AdobeStock_55807979_thumb.jpeg')
         ?>" />
      <h2>Our Inventory of Used Bicycles</h2>
      <p>Choose the bike you love.</p>
      <p>We will deliver it to your door and let you try it before you buy it.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Color</th>
        <th>Weight</th>
        <th>Condition</th>
        <th>Price</th>
      </tr>

<?php

$parser = new ParseCSV(PRIVATE_PATH . 'used_bicycles.csv');
$bike_array = $parser->parse();

?>
      <?php foreach($bike_array as $args) { ?>
        <?php $bike = new Bicycle($args); ?>
      <tr>
        <td><?php echo h($bike->brand); ?></td>
        <td><?php echo h($bike->model); ?></td>
        <td><?php echo h($bike->year); ?></td>
        <td><?php echo h($bike->category); ?></td>
        <td><?php echo h($bike->gender); ?></td>
        <td><?php echo h($bike->color); ?></td>
        <td><?php echo h($bike->weight_kg()) . ' / ' . h($bike->weight_lbs()); ?></td>
        <td><?php echo h($bike->condition()); ?></td>
        <td><?php echo h(
           $bike->price //money_format('$%i', $bike->price)
               ); ?></td>
      </tr>
      <?php } ?>

    </table>
  </div>

</div>

<?php include(PRIVATE_PATH . 'ftr.php'); ?>
