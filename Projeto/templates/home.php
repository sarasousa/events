  <nav id="menu">
    <ul>
      <li>
        <img class="event-icon" src="img/news-events-icon.png" alt="Generic placeholder image" height="25" width="25">
        <p>Events</p>
      </li>
      <li><a href="logout.php">Sign Out</a></li>
      <li id="search_ev"><a>Create Event</a></li>
      <li id="view_ev"><a>View Events</a>
        <nav>
          <ul class="sub-menu-view-ev">
            <a href="#owned"><li id="my_ev">Your Events</li></a>
            <a href="#joined"><li id="in_ev">Joined Events</li></a>
            <a href="#invited"><li id="inv_ev">Event Invites</li></a>
            <a href="#other"><li id="oth_ev">Public Events</li></a>
          </ul>
        </nav>
      </li>
      <li class="search-li">
        <div class="container-2">
          <span class="icon"><i class="fa fa-search"></i></span>
          <input type="search" id="search" placeholder="Search for an Event...">
        </div>
      </li>
    </ul>
  </nav>


  <a name="owned" class="link-separator" ></a>
  <section id="my_events">
    <div class="container">
    <? if (!empty($result))  : ?>
      <h2 id="title-my-events" class="event-title">Your Events</h2>
    <? endif; ?>
      <?
      foreach( $result as $column) {?>
      <div class="col">
        <img src="img/<?=$column['eid']?>.jpg" id="<?=$column['eid']?>" title="<?=$column['title']?>" type="hidden" width="960" height="640" />
        <button class="btn btn-view-more"><span>View More</span></button>
        <input type="hidden" name ="event_id" value="<?=$column['eid']?>">
      </div>
      <? } ?>
    </div>
  </section>

  <a name="joined" class="link-separator"></a>
  <section id="in_events">
    <div class="container">
       <? if (!empty($result_joined)) : ?>
      <h2 id="title-events" class="event-title">Joined Events</h2>
      <? endif; ?>
      <?
      foreach($result_joined as $column) {?>
      <?
          try {
            $title_event = getTitleByIdEvent($dbh, $column['event']);
          } catch (PDOException $e) {
            die($e->getMessage());
          }
      ?>
      <div class="col">
        <img src="img/<?=$column['event']?>.jpg" id="<?=$column['event']?>" title="<?=$title_event['title']?>" type="hidden" width="960" height="640" />
        <button class="btn btn-view-more"><span>View More</span></button>
        <input type="hidden" name ="event_id" value="<?=$column['event']?>">
      </div>
      <? } ?>
    </div>
  </section>

  <a name="invited" class="link-separator"></a>
  <section id="inv_events">
    <div class="container">
     <? if (!empty($result_invites)) : ?>
        <h2 id="title-events" class="event-title">Event Invites</h2>
        <? endif; ?>
      <?
      foreach($result_invites as $column) {?>
      <?
          try {
            $title_event = getTitleByIdEvent($dbh, $column['event']);
          } catch (PDOException $e) {
            die($e->getMessage());
          }
      ?>
      <div class="col">
        <img src="img/<?=$column['event']?>.jpg" id="<?=$column['event']?>" title="<?=$title_event['title']?>" type="hidden" width="960" height="640" />
        <button class="btn btn-view-more"><span>View More</span></button>
        <input type="hidden" name ="event_id" value="<?=$column['event']?>">
      </div>
      <? } ?>
    </div>
  </section>

  <a name="other" class="link-separator"></a>
  <section id="oth_events">
    <div class="container">
       <? if (!empty($result_public)) : ?>
      <h2 id="title-events" class="event-title">Public Events</h2>
      <? endif; ?>
      <?
      foreach($result_public as $column) {?>
      <div class="col">
        <img src="img/<?=$column['eid']?>.jpg" id="<?=$column['eid']?>" title="<?=$column['title']?>" type="hidden" width="960" height="640" />
        <button class="btn btn-view-more"><span>View More</span></button>
        <input type="hidden" name ="event_id" value="<?=$column['eid']?>">
      </div>
      <? } ?>
    </div>
  </section>
</div>
