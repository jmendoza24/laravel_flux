  <table class="table table-striped table-bordered">  
    <thead>
      <tr>
        <th>Forma</th>
        <th>Espesor (Thickness)</th>
        <th>Ancho (Wide)</th>
        <th>Altura (Wide2)</th>
        <th>Peso por Distancia</th>
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
          $display1 = "";           $display2 = "disabled";   $display3 = "disabled"; $display4 = "disabled";   $display8 = "";
         }else if(in_array($mat->forma, $tipo3414)){
          $display1 = "";           $display2 = "";           $display3 = "disabled"; $display4 = "disabled";   $display8 = "";
         }else if(in_array($mat->forma, $tipo56)){
          $display1 = "";           $display2 = "";           $display3 = "";         $display4 = "disabled";   $display8 = "";
         }else if(in_array($mat->forma, $tipo78910)){
          $display1 = "disabled";   $display2 = "disabled";   $display3 = "";         $display4 = "";           $display8 = "";
         }else if(in_array($mat->forma, $tipo1112)){
          $display1 = "disabled";   $display2 = "";           $display3 = "disabled"; $display4 = "disabled";   $display8 = "";
         }else if(in_array($mat->forma, $tipo13)){
          $display1 = "";           $display2 = "disabled";   $display3 = "disabled"; $display4 = "";           $display8 = "";
         }else{
          $display1 = "";
          $display2 = "";
          $display3 = "";
          $display4 = "";
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
        <td>
          <select class="form-control" id="espesor{{ $mat->id}}" {{ $display1 }} onchange="guarda_materialforma({{ $mat->id}},'espesor')">
            <option value="">Seleccione</option>
            @foreach($espesor as $esp)
              @if($esp->id_forma == $mat->idforma)
              <option value="{{$esp->id}}" {{($mat->espesor ==$esp->id)? 'selected':''}}>{{$esp->valor}}</option>
              @endif
            @endforeach
          </select>
        </td>
        <td>
          <select class="form-control" id="ancho{{ $mat->id}}" {{ $display2}} onchange="guarda_materialforma({{ $mat->id}},'ancho')">
            <option value="">Seleccione</option>
            @foreach($ancho as $anc)
              @if($anc->id_forma == $mat->idforma)
              <option value="{{$anc->id}}" {{($mat->espesor ==$anc->id)? 'selected':''}}>{{$anc->valor}}</option>
              @endif
            @endforeach
          </select>
        <td>
          <select class="form-control" id="altura{{ $mat->id}}" {{ $display3}} onchange="guarda_materialforma({{ $mat->id}},'altura')">
            <option value="">Seleccione</option>
            @foreach($altura as $alt)
              @if($alt->id_forma == $mat->idforma)
              <option value="{{$alt->id}}" {{($mat->espesor ==$alt->id)? 'selected':''}}>{{$alt->valor}}</option>
              @endif
            @endforeach
          </select>
        <td>
          <select class="form-control" id="peso_distancia{{ $mat->id}}" {{ $display4}} onchange="guarda_materialforma({{ $mat->id}},'peso_distancia')">
            <option value="">Seleccione</option>
            @foreach($peso as $pes)
              @if($pes->id_forma == $mat->idforma)
              <option value="{{$pes->id}}" {{($mat->espesor ==$pes->id)? 'selected':''}}>{{$pes->valor}}</option>
              @endif
            @endforeach
          </select>
        <td><input  type="number" id="precio{{ $mat->id}}" {{ $display8 }}  style="width: 110px;" class="form-control" step="any" min="0" onchange="guarda_materialforma({{ $mat->id}},'precio')" value="{{ $mat->precio}}"></td>
        <td>
          <span class="btn btn-float btn-outline-danger btn-round" onclick="elimina_producforma({{ $mat->id }},{{ $mat->id_producto }})"><i class="fa fa-trash"></i></span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
