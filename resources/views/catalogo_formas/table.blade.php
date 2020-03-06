<section id="drag-area">
  <div class="row" id="card-drag-area" style="background: #F5F7FA; padding-top: 10px;">

    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Espesor (Thickness)</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
            <table class="table table-striped table-bordered scroll-vertical display">
              <thead class="bg-success">
              <tr>
                <th>Forma</th>
                <th>Valor</th>
              </tr>
              </thead>
              <tbody>
                @foreach($ident_1 as $id1)
                <tr>
                  <td>{{ $id1->forma}}</td>
                  <td>{{ $id1->valor}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Ancho (Wide)</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <table class="table table-striped table-bordered scroll-vertical display">
              <thead class="bg-success">
              <tr>
                <th>Forma</th>
                <th>Valor</th>
              </tr>
              </thead>
              <tbody>
                @foreach($ident_2 as $id2)
                <tr>
                  <td>{{ $id2->forma}}</td>
                  <td>{{ $id2->valor}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Altura (Wide2)</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <table class="table table-striped table-bordered scroll-vertical display">
              <thead class="bg-success">
              <tr>
                <th>Forma</th>
                <th>Valor</th>
              </tr>
              </thead>
              <tbody>
                @foreach($ident_3 as $id3)
                <tr>
                  <td>{{ $id3->forma}}</td>
                  <td>{{ $id3->valor}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Peso por Distancia</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <table class="table table-striped table-bordered scroll-vertical display">
              <thead class="bg-success">
              <tr>
                <th>Forma</th>
                <th>Valor</th>
              </tr>
              </thead>
              <tbody>
                @foreach($ident_4 as $id4)
                <tr>
                  <td>{{ $id4->forma}}</td>
                  <td>{{ $id4->valor}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <!--
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">(OM)Ancho (Wide)</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <table class="table table-striped table-bordered scroll-vertical display">
              <thead>
              <tr>
                <th>Forma</th>
                <th>Valor</th>
              </tr>
              </thead>
              <tbody>
                @foreach($ident_5 as $id5)
                <tr>
                  <td>{{ $id5->forma}}</td>
                  <td>{{ $id5->valor}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">(OM)Largo (Length)</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <table class="table table-striped table-bordered scroll-vertical display">
              <thead>
              <tr>
                <th>Forma</th>
                <th>Valor</th>
              </tr>
              </thead>
              <tbody>
                @foreach($ident_6 as $id6)
                <tr>
                  <td>{{ $id6->forma}}</td>
                  <td>{{ $id6->valor}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">(OM)Peso (Weight)</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <table class="table table-striped table-bordered scroll-vertical display">
              <thead>
              <tr>
                <th>Forma</th>
                <th>Valor</th>
              </tr>
              </thead>
              <tbody>
                @foreach($ident_7 as $id7)
                <tr>
                  <td>{{ $id7->forma}}</td>
                  <td>{{ $id7->valor}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">OM(Precio)</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <table class="table table-striped table-bordered scroll-vertical display">
              <thead>
              <tr>
                <th>Forma</th>
                <th>Valor</th>
              </tr>
              </thead>
              <tbody>
                @foreach($ident_8 as $id8)
                <tr>
                  <td>{{ $id8->forma}}</td>
                  <td>{{ $id8->valor}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>--->
  </div>
</section>