<div class="row">
<div class="col-md-2 text-right">
    <span class="btn btn-outline-success mr-1" data-toggle="modal" data-target="#primary"  onclick="ver_catalogo(3,0,1,'',{{ $tblRh->id}},2)"><i class="fa fa-plus"></i> Nuevo Documento</span>
</div>
  @foreach($archivos as $ar)
    @if($ar->id_documento == 6)
      <div class="col-md-2 text-center" ><a href="{{$ar->archivo}}" target="_blank"> <i class="fa fa-file-pdf-o"></i> Solicitud de trabajo</a></div>
    @endif
    @if($ar->id_documento == 7)
      <div class="col-md-2 text-center" > <a href="{{$ar->archivo}}" target="_blank"><i class="fa fa-file-pdf-o"></i> Contrato individual</a></div>
    @endif
    @if($ar->id_documento == 8)
      <div class="col-md-2 text-center" > <a href="{{$ar->archivo}}" target="_blank"><i class="fa fa-file-pdf-o"></i> Hoja de entrevista</a></div>
    @endif
    @if($ar->id_documento == 11)
      <div class="col-md-2 text-center" > <a href="{{$ar->archivo}}" target="_blank"><i class="fa fa-file-pdf-o"></i> Evaluación de Periodo de Prueba</a></div>
    @endif
@endforeach 
</div>
<hr>
<br> 
<div class="row">
  <div class="col-md-6">
    <h3>VIRTUS Resultados de Prueba  @foreach($archivos as $ar)
                                        @if($ar->id_documento == 9)
                                         <a href="{{ $ar->archivo}}"> <span class="btn btn-sm btn-outline-success pull-right"><i class="fa fa-file-pdf-o"></i></span></a>
                                        @endif
                                      @endforeach
    </h3> 
      <table class="table table-bordered table-striped compact" style="width: 100%;">
      <thead class="bg-success">
          <tr>
              <th>Prueba</th>
              <th colspan="">Resultado</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>Emociones Positivas</td>
              <td><input type="text" style="width: 100px; padding: 1px;"  id="Emociones" value="{{ $virtus->Emociones }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Pensamientos Negativos</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Pensamientos" value="{{ $virtus->Pensamientos }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Compromiso & Enfoque</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Compromiso" value="{{ $virtus->Compromiso }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Relaciones Positivas</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Relaciones" value="{{ $virtus->Relaciones }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Sentido</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Sentido" value="{{ $virtus->Sentido }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Logros</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Logros" value="{{ $virtus->Logros }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Salud</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Salud" value="{{ $virtus->Salud }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Soledad</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Soledad" value="{{ $virtus->Soledad }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Felicidad Autoevaluación</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Felicidad" value="{{ $virtus->Felicidad }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Felicidad Promedio</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Promedio" value="{{ $virtus->Promedio }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Sabiduria</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Sabiduria" value="{{ $virtus->Sabiduria }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Valor</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Valor" value="{{ $virtus->Valor }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Humanidad</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Humanidad" value="{{ $virtus->Humanidad }}" class="mask form-control  form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Justicia</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Justicia" value="{{ $virtus->Justicia }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
           <tr>
              <td>Trascendencia</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Trascendencia" value="{{ $virtus->Trascendencia }}" class="mask form-control  form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Templanza</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Templanza" value="{{ $virtus->Templanza }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Creatividad</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Creatividad" value="{{ $virtus->Creatividad }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Amor por el Aprendizaje</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Amor" value="{{ $virtus->Amor }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Curiosidad</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Curiosidad" value="{{ $virtus->Curiosidad }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Perspectiva</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Perspectiva" value="{{ $virtus->Perspectiva }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Juicio</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Juicio" value="{{ $virtus->Juicio }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Honestidad</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Honestidad" value="{{ $virtus->Honestidad }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
           <tr>
              <td>Perseverancia</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Perseverancia" value="{{ $virtus->Perseverancia }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
           <tr>
              <td>Entusiasmo</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Entusiasmo" value="{{ $virtus->Entusiasmo }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
           <tr>
              <td>Valentia</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Valentia" value="{{ $virtus->Valentia }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Amabilidad</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Amabilidad" value="{{ $virtus->Amabilidad }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>

          <tr>
              <td>Inteligencia Social</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Inteligencia"  value="{{ $virtus->Inteligencia }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Amor</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Amor_amor" value="{{ $virtus->Amor_amor }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Equidad</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Equidad" value="{{ $virtus->Equidad }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
           <tr>
              <td>Liderazgo</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Liderazgo" value="{{ $virtus->Liderazgo }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
           <tr>
              <td>Trabajo de Equipo</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Trabajo" value="{{ $virtus->Trabajo }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Esperitualidad</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Esperitualidad" value="{{ $virtus->Esperitualidad }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Gratitud</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Gratitud" value="{{ $virtus->Gratitud }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Esperanza</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Esperanza" value="{{ $virtus->Esperanza }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Buen Humor</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Humor" value="{{ $virtus->Humor }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Apreciacion por la Belleza</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Belleza" value="{{ $virtus->Belleza }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Prudencia</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Prudencia" value="{{ $virtus->Prudencia }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Humildad</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Humildad"  value="{{ $virtus->Humildad }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Perdon</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"   id="Perdon" value="{{ $virtus->Perdon }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Auto Control</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Control" value="{{ $virtus->Control }}" class="mask form-control form-control-sm" onchange="virtus({{ $virtus->id_empleado }})"></td>
          </tr>
      </tbody>
    </table>
  </div>  
  <div class="col-md-6">
    <h3>Resultado Myers Briggs @foreach($archivos as $ar)
                                      @if($ar->id_documento == 10)
                                       <a href="{{ $ar->archivo}}"> <span class="btn btn-sm btn-outline-success pull-right"><i class="fa fa-file-pdf-o"></i></span></a>
                                      @endif
                                @endforeach
    </h3> 
    <table class="table table-striped table-bordered" style="" id="productos-table" style="width: 100%;">
      <thead class="bg-success">
          <tr>
              <th>Nombre</th>
              <th>Resultado </th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>Introversión (I)</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"id="Introversion" value="{{ $MyersBriggs->Introversion }}" class="mask form-control form-control-sm" onchange="MyersBriggs({{ $MyersBriggs->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Extroversión (E)</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"id="Extroversion" value="{{ $MyersBriggs->Extroversion }}" class="mask form-control form-control-sm" onchange="MyersBriggs({{ $MyersBriggs->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Intuitivo (N)</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"id="Intuitivo" value="{{ $MyersBriggs->Intuitivo }}" class="mask form-control form-control-sm" onchange="MyersBriggs({{ $MyersBriggs->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Sensorial (S)</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"id="Sensorial" value="{{ $MyersBriggs->Sensorial }}" class="mask form-control form-control-sm" onchange="MyersBriggs({{ $MyersBriggs->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Pensamiento (T)</td>
              <td><input type="text" name=""style="width: 100px; padding: 1px;" id="Pensamiento" value="{{ $MyersBriggs->Pensamiento }}" class="mask form-control form-control-sm" onchange="MyersBriggs({{ $MyersBriggs->id_empleado }})"></td>
          </tr>
          <tr>
              <td>IEmocional (F)</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="IEmocional" value="{{ $MyersBriggs->IEmocional }}" class="mask form-control form-control-sm" onchange="MyersBriggs({{ $MyersBriggs->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Calificador (J)</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;"id="Calificador" value="{{ $MyersBriggs->Calificador }}" class="mask form-control form-control-sm" onchange="MyersBriggs({{ $MyersBriggs->id_empleado }})"></td>
          </tr>
          <tr>
              <td>Perceptivo (P)</td>
              <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Perceptivo" value="{{ $MyersBriggs->Perceptivo }}" class="mask form-control form-control-sm" onchange="MyersBriggs({{ $MyersBriggs->id_empleado }})"></td>
          </tr>
      
      </tbody>
    </table>
    
  </div>
</div>

<div class="row">
      <div class="col-md-12">
        <h3>Evaluación Anual </h3>    
        <table class="table table-striped table-bordered" style="" id="productos-table" style="width: 100%">
          <thead class="bg-success">
              <tr>
                  <th>Descripcion</th>
                  <th>Fecha</th>
              </tr>
          </thead>
          <tbody>
            @foreach($archivos as $a)
            @if($a->id_documento==12)
              <tr>
                  <td><a href="{{ $a->archivo}}"> <span class="btn btn-sm btn-outline-success pull-right"><i class="fa fa-file-pdf-o"></i></span></a>{{ $a->descripcion}}</td>
                  <td>{{ $a->fecha }}</td>
              </tr>
              @endif
              @endforeach
          </tbody>
        </table>
      </div>
    </div> 