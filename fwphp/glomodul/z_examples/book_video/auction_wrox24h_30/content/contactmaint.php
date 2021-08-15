<?php
/**
 * contactmaint.php
 *
 * Maintain the Contacts table
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
// Is this an existing item or a new one?
if ($id) {
  // Get the existing information for an existing item
  $item = Contact::getContact($id);
} else {
  // Set up for a new item
  $item = new Contact;
}
  // set up the access dropdown, 
  // setting up the selected option for existing records
  $access_dropdown = $item->getAccess_DropDown();
?>
<h1>Contact Maintenance</h1>

<form action="index.php?content=about" method="post" name="maint" id="maint">

  <fieldset class="maintform">
    <legend><?php echo ($id) ? 'ID: '. $id : 'Add a Contact' ?></legend>
    <ul>
      <li><label for="first_name" class="required">First Name</label><br />
        <input type="text" name="first_name" id="first_name" class="required" 
        value="<?php echo htmlspecialchars($item->getFirst_name()); ?>" /></li>
      <li><label for="last_name" class="required">Last Name</label><br />
        <input type="text" name="last_name" id="last_name" class="required" 
        value="<?php echo htmlspecialchars($item->getLast_name()); ?>" /></li>
      <li><label for="position">Position</label><br />
        <input type="text" name="position" id="position" class="required" 
        value="<?php echo htmlspecialchars($item->getPosition()); ?>" /></li>
      <li><label for="email" >Email</label><br />
        <input type="text" name="email" id="email" 
        value="<?php echo htmlspecialchars($item->getEmail()); ?>" /></li>
      <li><label for="phone" >Phone</label><br />
        <input type="text" name="phone" id="phone" 
        value="<?php echo htmlspecialchars($item->getPhone()); ?>" /></li>
      <li><label for="user_name" class="required">User Name</label><br />
        <input type="text" name="user_name" id="user_name"  
        value="<?php echo htmlspecialchars($item->getUser_name()); ?>" /></li>
      <li><label for="password1" >New Password</label><br />
        <input type="password" name="password1" id="password1" autocomplete="off" /></li>
      <li><label for="password2" >Confirm Password</label><br />
        <input type="password" name="password2" id="password2" autocomplete="off" /></li>
      <li><?php echo $access_dropdown; ?></li>
    </ul>

    <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="id" id="id" value="<?php echo $item->getId(); ?>" />
    <input type="hidden" name="task" id="task" value="contact.maint" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="save" value="Save" />
    <a class="cancel" href="index.php?content=about">Cancel</a>
  </fieldset>
</form>
<?php endif; 