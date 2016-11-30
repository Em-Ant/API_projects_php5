
  <div class="container">
     <img src="<?=$sub_path?>/public/M1_logo.png" alt="Timestamp Microservice"/>
  </div>

  <div class="container">
    <h2>API Project: Timestamp Microservice - php5</h2>
    <h3>User Stories:</h3>
    <ol>
      <li>I can pass a string as a parameter, and it will check to see whether that string contains </br>either a unix timestamp or a natural language date (example: January 1, 2016)</li>
      <li>If it does, it returns both the Unix timestamp and the natural language form of that date.</li>
      <li>If it does not contain a date or Unix timestamp, it returns null for those properties.</li>
    </ol>

    <h3>Example Usage:</h3>
    <ul>
      <li><a href="<?=$ms_url?>/December%2015,%202015"><?=$base_url?>/<?=$ms_url?>/December%2015,%202015</a></li>
      <li><a href="<?=$ms_url?>/1450137600"><?=$base_url?>/<?=$ms_url?>/1450137600</a></li>
    </ul>

    <h3>Example Output:</h3>
    <p>
      { "unix": 1450137600, "natural": "December 15, 2015" }
    </p>
  </div>
