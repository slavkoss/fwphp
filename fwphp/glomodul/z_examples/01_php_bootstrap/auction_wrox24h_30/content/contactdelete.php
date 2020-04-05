<?php
/**
 * contactdelete.php
 *
 * Delete the Contacts 
 *
 * @version    1.2 2011-02-03
 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
$accessLevel = Contact::accessLevel();
if ($accessLevel != 'Admin') :
  echo 'Sorry, no access allowed to this page';
else :

$id = (int) $_GET['id'];
// Get the existing information for an existing item
$item = Contact::getContact($id);

?>
<h1>Contact Delete</h1>

<form action="index.php?content=about" method="post" name="maint" id="maint">

  <fieldset class="maintform">
    <legend><?php echo 'ID: '. $id ?></legend>
    <ul>
      <li><strong>First Name:</strong>
        <?php echo htmlspecialchars($item->getFirst_name()); ?></li>
      <li><strong>Last Name:</strong> 
        <?php echo htmlspecialchars($item->getLast_name()); ?></li>
      <li><strong>Position:</strong> 
        <?php echo htmlspecialchars($item->getPosition()); ?></li>
      <li><strong>Email:</strong>
        <?php echo htmlspecialchars($item->getEmail()); ?></li>
      <li><strong>Phone:</strong>
        <?php echo htmlspecialchars($item->getPhone()); ?></li>
    </ul>

    <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="id" id="id" value="<?php echo $item->getId(); ?>" />
    <input type="hidden" name="task" id="task" value="contact.delete" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="delete" value="Delete" />
    <a class="cancel" href="index.php?content=about">Cancel</a>
  </fieldset>
</form>
<?php endif; 