<div class='col-lg-9'>
  <ul class="list-group" >
    @for($i = 0; $i < 5; $i++)
    <li class="list-group-item">
    <div class="media">
      <a class="pull-left" href="#">
        <img width="80" class="media-object" src="/img/user.jpg" />
      </a>
      <div class="media-body">
        <h4 class="media-heading">I am test</h4>
        Abcde
      </div>
    </div>
    </li>
    @endfor
  </ul>
  <ul class="pagination">
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul>
</div>
<div class='col-lg-3 panel'>
  test
</div>
