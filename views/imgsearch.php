
<div class="container">
   <img src="public/M4_logo.png" alt="Image Search Microservice"/>
</div>

<div class="container">
  <h2>API Project: Image Search Abstraction Layer - php5</h2>
  <h3>User Stories:</h3>
  <ol>
    <li>II can get the image URLs, alt text and page urls for a set of images relating to a given search string.)</li>
    <li>I can paginate through the responses by adding a ?offset=2 parameter to the URL.</li>
    <li>I can get a list of the most recently submitted search strings.</li>
  </ol>

  <h3>Example Usage:</h3>
  <ul>
    <li><a href="<?=$ms_url?>/cats?offset=10"><?=$base_url?>/<?=$ms_url?>/cats?offset=10</a></li>
    <li><a href="<?=$ms_url?>/latest"><?=$base_url?>/<?=$ms_url?>/latest</a></li>
  </ul>

</div>
