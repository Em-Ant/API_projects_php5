
 <div class="container">
    <img src="public/M5_logo.png" alt="URL Shortener Logo"/>
 </div>
 <div class="container">
   <h2>API Project: File Analyser - php5</h2>
   <h3>User Stories:</h3>
   <ol>
     <li>I can submit a FormData object that includes a file upload.</li>
     <li>When I submit something, I will receive the file size in bytes within the JSON response.</li>
   </ol>

   <h3>Upload a File:</h3>
   <form enctype="multipart/form-data" class="" action="<?=$ms_url?>" method="POST">
     <input type="hidden" name="MAX_FILE_SIZE" value="102400" />
     <label for="input_1">Select a file (max 100k): </label>
     <input id="input_1" type="file" name="userfile">
     <input type="submit" value="Submit">
   </form>

   <h3>Example output:</h3>
   <p>
     { "name": "example.txt", "type": "text/plain", "size": "1284" }
   </p>

 </div>
