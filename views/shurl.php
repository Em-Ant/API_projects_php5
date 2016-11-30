
 <div class="container">
    <img src="<?=$sub_path?>/public/M3_logo.png" alt="URL Shortener Logo"/>
 </div>
 <div class="container">
   <h2>API Project: URL Shortener - php5</h2>
   <h3>User Stories:</h3>
   <ol>
     <li>I can POST a URL and I will receive a shortened URL in the JSON response.</li>
     <li>If I pass an invalid URL that doesn't follow the valid http://www.example.com format,
       the JSON response will contain an error instead.</li>
     <li>When I visit that shortened URL, it will redirect me to my original link..</li>
   </ol>

   <h3>Creation:</h3>
   <form class="" action="<?=$ms_url?>/new" method="POST">
     <label for="input_1">URL to shorten: </label>
     <input id="input_1" type="text" name="url" value="https://www.google.com">
     <input type="submit" name="" value="Submit">
   </form>

   <h3>Example output:</h3>
   <p>
     { "original_url": "https://www.google.com", "short_url": "1" }
   </p>

   <h3>Usage:</h3>
     <a href="<?=$ms_url?>/1"><?=$base_url?>/<?=$ms_url?>/1</a> redirects to <a href="https://www.google.com">https://www.google.com</a>
 </div>
