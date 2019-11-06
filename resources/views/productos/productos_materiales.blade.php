  <table class="table table-striped table-bordered">  
    <thead>
      <tr>
        <th>Forma</th>
        <th>Espesor (Thickness)</th>
        <th>Ancho (Wide)</th>
        <th>Altura (Wide2)</th>
        <th>Peso por Distancia</th>
        <!-- <th>Ancho (Wide)</th>
        <th>Largo (Length)</th>
        <th>Peso (Weight)</th>-->
        <th>Precio</th>
        <th></th>
      </tr>
    </thead>   
    <tbody>
    <?php 
      $tipos12  = array(1,2);
      $tipo3414 = array(3,4,14);
      $tipo56 = array(5,6);
      $tipo78910 = array(7,8,9,10);
      $tipo1112 = array(11,12);
      $tipo13 = array(13);
    ?>

      @foreach($materialesformas  as $mat)

      <?php 
         
         if (in_array($mat->forma, $tipos12)){
          $display1 = "";           $display2 = "readonly";   $display3 = "readonly"; $display4 = "readonly";
          $display5 = "";           $display6 = "";           $display7 = "";         $display8 = "";
         }else if(in_array($mat->forma, $tipo3414)){
          $display1 = "";           $display2 = "";           $display3 = "readonly"; $display4 = "readonly";
          $display5 = "readonly";   $display6 = "";           $display7 = "";         $display8 = "";
         }else if(in_array($mat->forma, $tipo56)){
          $display1 = "";           $display2 = "";           $display3 = "";         $display4 = "readonly";
          $display5 = "readonly";   $display6 = "";           $display7 = "";         $display8 = "";
         }else if(in_array($mat->forma, $tipo78910)){
          $display1 = "readonly";   $display2 = "readonly";   $display3 = "";         $display4 = "";
          $display5 = "readonly";   $display6 = "";           $display7 = "";         $display8 = "";
         }else if(in_array($mat->forma, $tipo1112)){
          $display1 = "readonly";   $display2 = "";           $display3 = "readonly"; $display4 = "readonly";
          $display5 = "readonly";   $display6 = "";           $display7 = "";         $display8 = "";
         }else if(in_array($mat->forma, $tipo13)){
          $display1 = "";           $display2 = "readonly";   $display3 = "readonly"; $display4 = "";
          $display5 = "";           $display6 = "";           $display7 = "";         $display8 = "";
         }else{
          $display1 = "";
          $display2 = "";
          $display3 = "";
          $display4 = "";
          $display5 = "";
          $display6 = "";
          $display7 = "";
          $display8 = "";
         }

        ?>
      <tr>
        <td>
            <label>{{ $mat->nforma }} {{ $mat->forma}}</label>
            <input type="hidden" id="wide{{ $mat->id}}" value="0">
            <input type="hidden" id="lenght{{ $mat->id}}" value="0">
            <input type="hidden" id="weight{{ $mat->id}}" value="0">
        </td>
        <td><input  type="number" id="espesor{{ $mat->id}}" {{ $display1 }}  class="form-control" step="any" min="0" onchange="guarda_materialforma({{ $mat->id}},'espesor')" value="{{$mat->espesor}}"></td>
        <td><input  type="number" id="ancho{{ $mat->id}}" {{ $display2}}   class="form-control" step="any" min="0"  onchange="guarda_materialforma({{ $mat->id}},'ancho')" value="{{ $mat->ancho}}"></td>
        <td><input  type="number" id="altura{{ $mat->id}}" {{ $display3 }}  class="form-control" step="any" min="0" onchange="guarda_materialforma({{ $mat->id}},'altura')" value="{{ $mat->altura}}"></td>
        <td><input  type="number" id="peso_distancia{{ $mat->id}}" {{ $display4 }}  class="form-control" step="any" min="0" onchange="guarda_materialforma({{ $mat->id}},'peso_distancia')" value="{{$mat->peso_distancia}}"></td>
        <!-- 
        <td><input  type="number" id="wide{{ $mat->id}}" {{ $display5 }}  class="form-control" step="any" min="0" onchange="guarda_materialforma({{ $mat->id}},'wide')" value="{{$mat->wide}}"></td>
        <td><input  type="number" id="lenght{{ $mat->id}}" {{ $display6 }}  class="form-control" step="any" min="0" onchange="guarda_materialforma({{ $mat->id}},'lenght')" value="{{ $mat->lenght}}"></td>
        <td><input  type="number" id="weight{{ $mat->id}}" {{ $display7 }}  class="form-control" step="any" min="0" onchange="guarda_materialforma({{ $mat->id}},'weight')" value="{{ $mat->weight}}"></td>--->
        <td><input  type="number" id="precio{{ $mat->id}}" {{ $display8 }}  style="width: 110px;" class="form-control" step="any" min="0" onchange="guarda_materialforma({{ $mat->id}},'precio')" value="{{ $mat->precio}}"></td>
        <td>
          <span class="btn btn-float btn-outline-danger btn-round" onclick="elimina_producforma({{ $mat->id }},{{ $mat->id_producto }})"><i class="fa fa-trash"></i></span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
