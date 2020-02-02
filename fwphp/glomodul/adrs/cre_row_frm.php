  <!--             r o w c r e  frm  -->
  <br /><br />
  <div class="xxbox">
    <form action="<?=$this->pp1->module_url . QS?>i/c/t/song/" method="POST">

        <label>Artist </label><input type="text" name="artist" value="" required />
        <label>Track </label> <input type="text" name="track" value="" required />
        <label>Link </label>  <input type="text" name="link" value="" />

        <input type="submit" name="submit_add_song" value="Add row" />
    </form>
  </div>
