<?php
/**
 * about.php
 *
 * Content for About us page
 *
 * @version    1.2 2011-02-03
 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
// Get the contact information
$items = Contact::getContacts();
$accessLevel = Contact::accessLevel();
?>
<h1>About Us
  <?php if ($accessLevel == 'Admin') : ?>
    <a class="button" href="index.php?content=contactmaint&id=0">Add</a>
  <?php endif; ?>
</h1>
<p>We are all happy to be a part of this. Please contact any of us with questions.</p>

<ul class="ulfancy">
  <?php foreach ($items as $i=>$item) : ?>
    <li class="row<?php echo $i % 2; ?>">
      <h2><?php echo htmlspecialchars($item->name()); ?>
      <?php if ($accessLevel == 'Admin') : ?>
        <a class="button" 
          href="index.php?content=contactdelete&id=<?php echo $item->getId(); ?>">Delete</a>
        <a class="button" 
          href="index.php?content=contactmaint&id=<?php echo $item->getId(); ?>">Edit</a>
      <?php endif; ?>
      </h2>
      <p>Position: <?php echo htmlspecialchars($item->getPosition()); ?><br />
      <?php echo htmlspecialchars($item->getEmail()); ?><br />
      Phone: <?php echo htmlspecialchars($item->getPhone()); ?><br /></p>
    </li>
  <?php endforeach; ?>
</ul>