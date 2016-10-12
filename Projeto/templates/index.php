  <nav id="menu">
    <ul>
      <li>
        <img class="event-icon" src="img/news-events-icon.png" alt="Generic placeholder image" height="25" width="25">
        <p>Events</p>
      </li>
      <li id="sign_in"><a>Sign In</a></li>
      <li id="sign_up"><a>Sign Up</a></li>
    </ul>
  </nav>

  <section >
    <div class="container index-container">
      <?
      foreach( $result as $column) {?>
      <div class="col">
        <img  src="img/<?=$column['eid']?>.jpg" width="960" height="640" />
        <button class="btn btn-view-more"><span>View More</span></button>
        <input type="hidden" name ="event_id" value="<?=$column['eid']?>">
      </div>
      <? } ?>
    </div>
  </section>
</div>
