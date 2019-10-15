  <table class="table table-striped table-bordered">  
    <thead>
      <tr>
        <th>Forma</th>
        <th>Espesor (Thickness)</th>
        <th>Ancho (Wide)</th>
        <th>Altura (Wide2)</th>
        <th>Peso por Distancia</th>
        <th>Ancho (Wide)</th>
        <th>Largo (Length)</th>
        <th>Peso (Weight)</th>
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
          </td>
        <td><input  type="number" id="cam{{ $mat->id}}1" {{ $display1 }}  class="form-control" step="any" min="0" name="a1"></td>
        <td><input  type="number" id="cam{{ $mat->id}}2" {{ $display2}}  class="form-control" step="any" min="0" name="a2"></td>
        <td><input  type="number" id="cam{{ $mat->id}}3" {{ $display3 }}  class="form-control" step="any" min="0" name="a4"></td>
        <td><input  type="number" id="cam{{ $mat->id}}4" {{ $display4 }}  class="form-control" step="any" min="0" name="s2"></td>
        <td><input  type="number" id="cam{{ $mat->id}}5" {{ $display5 }}  class="form-control" step="any" min="0" name="ss"></td>
        <td><input  type="number" id="cam{{ $mat->id}}6" {{ $display6 }}  class="form-control" step="any" min="0" name="sss"></td>
        <td><input  type="number" id="cam{{ $mat->id}}7" {{ $display7 }}  class="form-control" step="any" min="0" name="ssss"></td>
        <td><input  type="number" id="cam{{ $mat->id}}8" {{ $display8 }}  style="width: 110px;" class="form-control" step="any" min="0" name="ssss"></td>
        <td>
          <span class="btn btn-float btn-outline-danger btn-round" onclick="elimina_producforma({{ $mat->id }},{{ $mat->id_producto }})"><i class="fa fa-trash"></i></span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
