<div class="popup-container">
<div id="popup" class="popup">
  <form action="login.php" id="login_form" method="post" name="login_form">
    <a class="close-thik"></a>
    <h2>Sign In</h2>
    <hr>
    <input id="login_email" name="login_email" placeholder="Email" type="text">
    <input id="login_password" name="login_password" placeholder="Password" type="password" />
    <button type="submit">Confirm</a>
  </form>
</div>
</div>

<div class="popup-container">
<div id="popup-register" class="popup">
<form action="register.php" id="register_form" method="post" name="register_form">
  <a class="close-thik"></a>
  <h2>Sign Up</h2>
  <hr>
  <input id="register_name" name="register_name" placeholder="Name" type="text">
  <input id="register_username" name="register_username" placeholder="Username" type="text">
  <input id="register_email" name="register_email" placeholder="Email" type="text">
  <input id="register_password" name="register_password" placeholder="Password" type="password" />
  <button type="submit">Confirm</a>
</form>
</div>
</div>


<div class="popup-container">
<div id="popup-invite-people" class="popup">
<form action="invite-people.php" id="invite_form" method="post" name="invite_form">
<input type="hidden" name="eid">
  <a class="close-thik"></a>
  <h2>Invite</h2>
  <hr>
  <h3>Select an user you want to invite</h3>
  <select name="invited_email" class="select-time">
      <?
        foreach($result_users as $column) {?>
        <option><?=$column['email']?></option>
    <? } ?>
  </select>
  <button type="submit">Invite</a>
</form>
</div>
</div>


<div class="popup-container">
<div class="popup modal-view-more">
  <a class="close-thik view-more"></a>
  <h2></h2>
  <hr>
  <span class="event-type"><p></p></span>
  <div id="event-image">
    <img src="" alt="Event Image"/>
  </div>
  <div id="event-description">
    <p class="description"></p>
  </div>
  <div class="event-date">
    <p class="event-date"></p>
    <p class="event-date"></p>
  </div>
   <div id="event-location">
    <p class="location"></p>
  </div>
  <? if (isset($_SESSION['user_id'])) {?>
  <form class="event-action" action="join-event.php" method="post">
    <input type="hidden" name ="eid">
    <button id="join-btn" type="submit" name="join-btn">Join</button>
  </form>
  <form class="event-action" action="decline-event.php" method="post">
    <input type="hidden" name ="eid">
    <button id="decline-btn" type="submit" name="decline-btn">Decline</button>
  </form>
  <form class="event-action" action="leave-event.php" method="post">
    <input type="hidden" name ="eid">
    <button id="leave-btn" type="submit" name="leave-btn">Leave</button>
  </form>
  <form class="event-action" action="#" method="post">
    <input type="hidden" name ="eid">
    <button id="invite-btn" type="button" name="invite-btn">Invite</button>
  <form class="event-action" action="#" method="post">
    <input type="hidden" name ="eid">
    <button id="edit-btn" type="button" name="edit-btn">Edit</button>
  </form>
  </form>
  <div class="event-comments">
    <span>
    </span>
    <form class="comment" action="add-comment.php" method="post">
      <input type="hidden" name ="eid">
      <input type="text" name="comment" value="" placeholder="Insert your comment">
      <button type="submit" name="comment-btn">Comment</button>
    </form>
    <? } ?>
  </div>
</div>
</div>

<div class="popup-container">
<div id="popup-create-event" class="popup">
  <form action="create-event.php" id="form" method="post" name="create_form" enctype="multipart/form-data">
    <a class="close-thik"></a>
    <h2>Create Event</h2>
    <hr>
    <div id="nestedform">
      <div id="upload-pic">
        <h3>Event picture</h3>
        <input type="file" name="event_photo" size="25" >
        <!--<button class="submit" type="submit" id="submit" name="submit" value="Submit">Confirm</button>-->
      </div>
    </div>
    <input id="name" name="event_title" placeholder="Title" type="text">
    <input id="location" name="event_location" placeholder="Location" type="text">
    <textarea  id="description" name="event_description" rows="3" placeholder="Description"  cols="20"></textarea>
    <div>
      <div id ="startd-col">
        <h3>Start Date</h3>
          <div class="menu-time-wrap">
            <select name="s_day" class="select-time">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
          </div>
          <div class="menu-time-wrap">
            <select name="s_month" class="select-time month">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
          <div class="menu-time-wrap">
            <select name="s_year" class="select-time year">
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
            </select>
          </div>
       <!--<input class="time_input" id="start-day" name="start-day" placeholder="DD" type="date">
       <input class="time_input" id="start-month" name="start-month" placeholder="MM" type="date">
       <input class="time_input" id="start-year" name="start-year" placeholder="YYYY" type="date">-->
      </div>
      <div id ="startt-col">
        <h3>Start Hour</h3>
        <div class="menu-time-wrap">
          <select name="s_hour" class="select-time">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
          </select>
        </div>
        <div class="menu-time-wrap">
          <select name="s_min" class="select-time min">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53</option>
            <option value="54">54</option>
            <option value="55">55</option>
            <option value="56">56</option>
            <option value="57">57</option>
            <option value="58">58</option>
            <option value="59">59</option>
          </select>
        </div>
      </div>
      <div id ="endd-col">
        <h3>End Date</h3>
        <div class="menu-time-wrap">
          <select name="e_day" class="select-time">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>
        </div>
        <div class="menu-time-wrap">
          <select name="e_month" class="select-time month">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select>
        </div>
        <div class="menu-time-wrap">
          <select name="e_year" class="select-time year">
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
          </select>
        </div>
      </div>
      <div id ="endt-col">
        <h3>End Hour</h3>
        <div class="menu-time-wrap">
          <select name="e_hour" class="select-time">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
          </select>
        </div>
        <div class="menu-time-wrap">
          <select name="e_min" class="select-time min">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53</option>
            <option value="54">54</option>
            <option value="55">55</option>
            <option value="56">56</option>
            <option value="57">57</option>
            <option value="58">58</option>
            <option value="59">59</option>
          </select>
        </div>
      </div>
    </div>
    <div id ="endd-col">
      <div id = "sub-menu">
        <h3>Type</h3>
        <select name="event_type" class="select-type">
          <option value="party">Party</option>
          <option value="concert">Concert</option>
          <option value="conference">Conference</option>
        </select>
      </div>
    </div>
    <div id ="endt-col">
      <div id = "sub-menu">
        <h3>State</h3>
        <select name="event_state" class="select-state">
          <option value="private">Private</option>
          <option value="public">Public</option>
        </select>
      </div>
    </div>
    <button type="submit">Confirm</button>
  </form>
</div>
</div>

<div class="popup-container">
<div id="popup-edit-event" class="popup" style="display: none">
  <form action="edit-event.php" id="form" method="post" name="edit_form" enctype="multipart/form-data">
    <input type="hidden" name="edit-id">
    <a class="close-thik"></a>
    <h2>Edit Event</h2>
    <hr>
    <div id="nestedform">
      <div id="upload-pic">
        <h3>Event picture</h3>
        <input type="file" name="ed_photo" size="25" >
        <!--<button class="submit" type="submit" id="submit" name="submit" value="Submit">Confirm</button>-->
      </div>
    </div>
    <input id="name" name="ed_title" placeholder="Title" type="text">
    <input id="location" name="ed_location" placeholder="Location" type="text">
    <textarea  id="description" name="ed_description" rows="3" placeholder="Description"  cols="20"></textarea>
    <div>
      <div id ="startd-col">
        <h3>Start Date</h3>
          <div class="menu-time-wrap">
            <select name="ed_s_day" class="select-time">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
          </div>
          <div class="menu-time-wrap">
            <select name="ed_s_month" class="select-time month">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
          <div class="menu-time-wrap">
            <select name="ed_s_year" class="select-time year">
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
            </select>
          </div>
       <!--<input class="time_input" id="start-day" name="start-day" placeholder="DD" type="date">
       <input class="time_input" id="start-month" name="start-month" placeholder="MM" type="date">
       <input class="time_input" id="start-year" name="start-year" placeholder="YYYY" type="date">-->
      </div>
      <div id ="startt-col">
        <h3>Start Hour</h3>
        <div class="menu-time-wrap">
          <select name="ed_s_hour" class="select-time">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
          </select>
        </div>
        <div class="menu-time-wrap">
          <select name="ed_s_min" class="select-time min">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53</option>
            <option value="54">54</option>
            <option value="55">55</option>
            <option value="56">56</option>
            <option value="57">57</option>
            <option value="58">58</option>
            <option value="59">59</option>
          </select>
        </div>
      </div>
      <div id ="endd-col">
        <h3>End Date</h3>
        <div class="menu-time-wrap">
          <select name="ed_e_day" class="select-time">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>
        </div>
        <div class="menu-time-wrap">
          <select name="ed_e_month" class="select-time month">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select>
        </div>
        <div class="menu-time-wrap">
          <select name="ed_e_year" class="select-time year">
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
          </select>
        </div>
      </div>
      <div id ="endt-col">
        <h3>End Hour</h3>
        <div class="menu-time-wrap">
          <select name="ed_e_hour" class="select-time">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
          </select>
        </div>
        <div class="menu-time-wrap">
          <select name="ed_e_min" class="select-time min">
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53</option>
            <option value="54">54</option>
            <option value="55">55</option>
            <option value="56">56</option>
            <option value="57">57</option>
            <option value="58">58</option>
            <option value="59">59</option>
          </select>
        </div>
      </div>
    </div>
    <div id ="endd-col">
      <div id = "sub-menu">
        <h3>Type</h3>
        <select name="ed_type" class="select-type">
          <option value="party">Party</option>
          <option value="concert">Concert</option>
          <option value="conference">Conference</option>
        </select>
      </div>
    </div>
    <div id ="endt-col">
      <div id = "sub-menu">
        <h3>State</h3>
        <select name="ed_state" class="select-state">
          <option value="private">Private</option>
          <option value="public">Public</option>
        </select>
      </div>
    </div>
    <button type="submit">Edit</button>
    <button id='del-btn' type="button">Delete</button>
  </form>
</div>
</div>

<div class="popup-container">
<div id="popup-error" class="popup">
<form action="index.php" id="error_form" method="post" name="form">
 <a class="close-thik"></a>
 <h2>Error</h2>
 <hr>
 <p>Wrong email or password!</p>
 <button type="submit">Ok</a>
</form>
</div>
</div>

<div class="popup-container">
<div id="popup-error-wemail" class="popup">
<form action="index.php" id="error_form1" method="post" name="form">
 <a class="close-thik"></a>
 <h2>Error</h2>
 <hr>
 <p>Don't you have an email?</p>
 <button type="submit">Ok</a>
</form>
</div>
</div>

<div class="popup-container">
<div id="popup-error-wpassword" class="popup">
<form action="index.php" id="error_form2" method="post" name="form">
 <a class="close-thik"></a>
 <h2>Error</h2>
 <hr>
 <p>Set a password!</p>
 <button type="submit">Ok</a>
</form>
</div>
</div>

<div class="popup-container">
<div id="popup-error-wname" class="popup">
<form action="index.php" id="error_form3" method="post" name="form">
 <a class="close-thik"></a>
 <h2>Error</h2>
 <hr>
 <p>No Name?</p>
 <button type="submit">Ok</a>
</form>
</div>
</div>

<div class="popup-container">
<div id="popup-error-wusername" class="popup">
<form action="index.php" id="error_form4" method="post" name="form">
 <a class="close-thik"></a>
 <h2>Error</h2>
 <hr>
 <p><?echo $error_msg?></p>
 <button type="submit">Ok</a>
</form>
</div>
</div>

<div class="popup-container">
<div id="del-confirm" class="popup">
<form action="delete-event.php" method="post" name="form">
 <a class="close-thik"></a>
 <h2>Delete Event</h2>
 <hr>
 <p>Are you sure you want to delete this event?</p>
 <input type="hidden" name ="eid">
 <button type="submit">Yes</a>
</form>
</div>
</div>

<div class="popup-container">
<div id="popup-error-invalidpass" class="popup">
<form action="index.php" id="error_form5" method="post" name="form">
 <a class="close-thik"></a>
 <h2>Error</h2>
 <hr>
 <p id="special-p">Invalid Password!</p>
 <p>Use between 5-32 characters.</p>
 <button type="submit">Ok</a>
</form>
</div>
</div>

<div class="popup-container">
<div id="popup-error-alre-regist" class="popup">
<form action="index.php" id="error_form6" method="post" name="form">
 <a class="close-thik"></a>
 <h2>Error</h2>
 <hr>
 <p>Username or E-mail Unavailable!</p>
 <button type="submit">Ok</a>
</form>
</div>
</div>

<div class="popup-container">
<div id="popup-error-invite" class="popup">
<form action="home.php" id="error_form7" method="post" name="form">
 <a class="close-thik"></a>
 <h2>Error</h2>
 <hr>
 <p id="special-p">This user has already been</p>
 <p>registered or invited to this event!</p>
 <button type="submit">Ok</a>
</form>
</div>
</div>