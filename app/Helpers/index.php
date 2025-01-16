<?php 
    // require_once('./vendor/autoload.php');
    

    function generar_word($data, $id){ 
    
    $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('Template.docx');

    //Opcionmultiple16
    $opc16a = ($data->motivoSeleccion) =='16a' ?'x' : '' ;
    $opc16b = ($data->motivoSeleccion) =='16b' ?'x' : '' ;
    $opc16c = ($data->motivoSeleccion) =='16c' ?'x' : '' ;

    //Opcionmultiple17
    $opc17a = ($data->opcionSeleccionada) =='inclusion' ?'x' : '' ;
    $opc17b = ($data->opcionSeleccionada) =='modificacion' ?'x' : '' ;
    $opc17c = ($data->opcionSeleccionada) =='ninguno' ?'x' : '' ;

    //Opcionmultiple29
    $opc29a = ($data->opcionselec29) =='29a' ?'x' : '' ;
    $opc29b = ($data->opcionselec29) =='29b' ?'x' : '' ;
    $opc29c = ($data->opcionselec29) =='29c' ?'x' : '' ;

    //Opcionmultiple34
    $opc34a = ($data->opcionselec34) =='34a' ?'x' : '' ;
    $opc34b = ($data->opcionselec34) =='34b' ?'x' : '' ;

    //Opcionmultiple30
    $opc30a = ($data->opcionselec30) =='30a' ?'x' : '' ;
    $opc30b = ($data->opcionselec30) =='30b' ?'x' : '' ;


    //Fecha 35
    if($data->Date35 == ''){
        $mesLetra35 ="NA";
        }else{
        $fecha35bb =  ($data->Date35);
            $fechaArray = explode("-", $fecha35bb);
            $año35 = $fechaArray[0];
            $mes35 = $fechaArray[1];
            $dia35 = $fechaArray[2];

        // $meses35 = [
        //     "01" => "Enero",
        //     "02" => "Febrero",
        //     "03" => "Marzo",
        //     "04" => "Abril",
        //     "05" => "Mayo",
        //     "06" => "Junio",
        //     "07" => "Julio",
        //     "08" => "Agosto",
        //     "09" => "Septiembre",
        //     "10" => "Octubre",
        //     "11" => "Noviembre",
        //     "12" => "Diciembre"
        // ];
        $mesLetra35 = $dia35 ."-".$mes35."-".$año35;
    }

    //Opcionmultiple35
    $opc35a = ($data->opcionSeleccionada2) =='35a' ?'x' : '' ;
    $op35 = ($mesLetra35);
    $opc35b = ($data->opcionSeleccionada2) =='35b' ? $op35 : 'NA' ;
    $opc35c = ($data->opcionSeleccionada2) =='35c' ?'x' : '' ;

    //Fecha 31
    if($data->Date31 == ''){
        $mesLetra31 ="NA";
        }else{
        $fecha31bb =  ($data->Date31);
            $fechaArray = explode("-", $fecha31bb);
            $año31 = $fechaArray[0];
            $mes31 = $fechaArray[1];
            $dia31 = $fechaArray[2];

        // $meses31 = [
        //     "01" => "Enero",
        //     "02" => "Febrero",
        //     "03" => "Marzo",
        //     "04" => "Abril",
        //     "05" => "Mayo",
        //     "06" => "Junio",
        //     "07" => "Julio",
        //     "08" => "Agosto",
        //     "09" => "Septiembre",
        //     "10" => "Octubre",
        //     "11" => "Noviembre",
        //     "12" => "Diciembre"
        // ];
        $mesLetra31 = $dia31 ."-".$mes31."-".$año31;
    }

    //Opcionmultiple31
    $opc31a = ($data->opcionSeleccionada31) =='31a' ?'x' : '' ;
    $op31 = ($mesLetra31);
    $opc31b = ($data->opcionSeleccionada31) =='31b' ? $op31 : 'NA' ;
    $opc31c = ($data->opcionSeleccionada31) =='31c' ?'x' : '' ;


    //Fecha 1
    $fecha1 =  ($data->fecha1);
        $fechaArray = explode("-", $fecha1);
        $año1 = $fechaArray[0];
        $mes1 = $fechaArray[1];
        $dia1 = $fechaArray[2];

    // $meses1 = [
    //     "01" => "Enero",
    //     "02" => "Febrero",
    //     "03" => "Marzo",
    //     "04" => "Abril",
    //     "05" => "Mayo",
    //     "06" => "Junio",
    //     "07" => "Julio",
    //     "08" => "Agosto",
    //     "09" => "Septiembre",
    //     "10" => "Octubre",
    //     "11" => "Noviembre",
    //     "12" => "Diciembre"
    // ];

    $mesLetra1 = $dia1 ."-".$mes1."-".$año1;


    //Fecha 5
    if($data->fecha5 == ''){
        $mesLetra5 = "NA";
    }else{
        $fecha5 =  ($data->fecha5);
        $fechaArray = explode("-", $fecha5);
        $año5 = $fechaArray[0];
        $mes5 = $fechaArray[1];
        $dia5 = $fechaArray[2];

    // $meses5 = [
    //     "01" => "Enero",
    //     "02" => "Febrero",
    //     "03" => "Marzo",
    //     "04" => "Abril",
    //     "05" => "Mayo",
    //     "06" => "Junio",
    //     "07" => "Julio",
    //     "08" => "Agosto",
    //     "09" => "Septiembre",
    //     "10" => "Octubre",
    //     "11" => "Noviembre",
    //     "12" => "Diciembre"
    // ];

    $mesLetra5 = $dia5 ."-".$mes5."-".$año5;
    }
    

    //Fecha 5b
    if($data->fecha5b == ''){
        $mesLetra5b ="NA";
        }else{
        $fecha5bb =  ($data->fecha5b);
            $fechaArray = explode("-", $fecha5bb);
            $año5b = $fechaArray[0];
            $mes5b = $fechaArray[1];
            $dia5b = $fechaArray[2];

        // $meses5b = [
        //     "01" => "Enero",
        //     "02" => "Febrero",
        //     "03" => "Marzo",
        //     "04" => "Abril",
        //     "05" => "Mayo",
        //     "06" => "Junio",
        //     "07" => "Julio",
        //     "08" => "Agosto",
        //     "09" => "Septiembre",
        //     "10" => "Octubre",
        //     "11" => "Noviembre",
        //     "12" => "Diciembre"
        // ];

        $mesLetra5b = $dia5b ."-".$mes5b."-".$año5b;
    }
        //Fecha 7
        $fecha7 =  ($data->fecha7);
            $fechaArray = explode("-", $fecha7);
            $año7 = $fechaArray[0];
            $mes7 = $fechaArray[1];
            $dia7 = $fechaArray[2];

        // $meses7 = [
        //     "01" => "Enero",
        //     "02" => "Febrero",
        //     "03" => "Marzo",
        //     "04" => "Abril",
        //     "05" => "Mayo",
        //     "06" => "Junio",
        //     "07" => "Julio",
        //     "08" => "Agosto",
        //     "09" => "Septiembre",
        //     "10" => "Octubre",
        //     "11" => "Noviembre",
        //     "12" => "Diciembre"
        // ];

        $mesLetra7 = $dia7 ."-".$mes7."-".$año7;


        //Fecha 7b
        if($data->fecha7b == ''){
            $mesLetra7b ="NA";
            }else{
            $fecha7bb =  ($data->fecha7b);
                $fechaArray = explode("-", $fecha7bb);
                $año7b = $fechaArray[0];
                $mes7b = $fechaArray[1];
                $dia7b = $fechaArray[2];
    
            // $meses7b = [
            //     "01" => "Enero",
            //     "02" => "Febrero",
            //     "03" => "Marzo",
            //     "04" => "Abril",
            //     "05" => "Mayo",
            //     "06" => "Junio",
            //     "07" => "Julio",
            //     "08" => "Agosto",
            //     "09" => "Septiembre",
            //     "10" => "Octubre",
            //     "11" => "Noviembre",
            //     "12" => "Diciembre"
            // ];
            $mesLetra7b = $dia7b ."-".$mes7b."-".$año7b;
        }


            //Fecha 16 inicio
            $fechaInicio =  ($data->startDate);
                $fechaArray = explode("-", $fechaInicio);
                $año16 = $fechaArray[0];
                $mes16 = $fechaArray[1];
                $dia16 = $fechaArray[2];

            // $meses16 = [
            //     "01" => "Enero",
            //     "02" => "Febrero",
            //     "03" => "Marzo",
            //     "04" => "Abril",
            //     "05" => "Mayo",
            //     "06" => "Junio",
            //     "07" => "Julio",
            //     "08" => "Agosto",
            //     "09" => "Septiembre",
            //     "10" => "Octubre",
            //     "11" => "Noviembre",
            //     "12" => "Diciembre"
            // ];

            $fechaInicial16 = $dia16 ."-".$mes16."-".$año16;
            
            //Fecha 16 final
            $fechaFinal =  ($data->endDate);
                $fechaArray = explode("-", $fechaFinal);
                $año16b = $fechaArray[0];
                $mes16b = $fechaArray[1];
                $dia16b = $fechaArray[2];

            // $meses16b = [
            //     "01" => "Enero",
            //     "02" => "Febrero",
            //     "03" => "Marzo",
            //     "04" => "Abril",
            //     "05" => "Mayo",
            //     "06" => "Junio",
            //     "07" => "Julio",
            //     "08" => "Agosto",
            //     "09" => "Septiembre",
            //     "10" => "Octubre",
            //     "11" => "Noviembre",
            //     "12" => "Diciembre"
            // ];

            $fechaInicial16b = $dia16b ."-".$mes16b."-".$año16b;


        //Fecha 18  
        if($data->fecha18 == ''){
            $mesLetra18 ="NA";
            }else{
            $fecha18bb =  ($data->fecha18);
                $fechaArray = explode("-", $fecha18bb);
                $año18 = $fechaArray[0];
                $mes18 = $fechaArray[1];
                $dia18 = $fechaArray[2];
    
            // $meses18 = [
            //     "01" => "Enero",
            //     "02" => "Febrero",
            //     "03" => "Marzo",
            //     "04" => "Abril",
            //     "05" => "Mayo",
            //     "06" => "Junio",
            //     "07" => "Julio",
            //     "08" => "Agosto",
            //     "09" => "Septiembre",
            //     "10" => "Octubre",
            //     "11" => "Noviembre",
            //     "12" => "Diciembre"
            // ];
            $mesLetra18 = $dia18 ."-".$mes18."-".$año18;
        }



        //Fecha 19
        if($data->fecha19 == ''){
            $mesLetra19 ="NA";
            }else{
            $fecha19bb =  ($data->fecha19);
                $fechaArray = explode("-", $fecha19bb);
                $año19 = $fechaArray[0];
                $mes19 = $fechaArray[1];
                $dia19 = $fechaArray[2];
    
            // $meses19 = [
            //     "01" => "Enero",
            //     "02" => "Febrero",
            //     "03" => "Marzo",
            //     "04" => "Abril",
            //     "05" => "Mayo",
            //     "06" => "Junio",
            //     "07" => "Julio",
            //     "08" => "Agosto",
            //     "09" => "Septiembre",
            //     "10" => "Octubre",
            //     "11" => "Noviembre",
            //     "12" => "Diciembre"
            // ];

            $mesLetra19 = $dia19 ."-".$mes19."-".$año19;
        }

        //Fecha 27
        if($data->fecha27 == ''){
            $mesLetra27 ="NA";
            }else{
            $fecha27bb =  ($data->fecha27);
                $fechaArray = explode("-", $fecha27bb);
                $año27 = $fechaArray[0];
                $mes27 = $fechaArray[1];
                $dia27 = $fechaArray[2];
    
            // $meses27 = [
            //     "01" => "Enero",
            //     "02" => "Febrero",
            //     "03" => "Marzo",
            //     "04" => "Abril",
            //     "05" => "Mayo",
            //     "06" => "Junio",
            //     "07" => "Julio",
            //     "08" => "Agosto",
            //     "09" => "Septiembre",
            //     "10" => "Octubre",
            //     "11" => "Noviembre",
            //     "12" => "Diciembre"
            // ];

            $mesLetra27 = $dia27 ."-".$mes27."-".$año27;
        }

         // if(($data->group2a) =='no'){

    //     $array = json_decode(json_encode($data->beneficiarios), true);
    //     for( $i = 0; $i <6 ; $i++){
    //         if(array_key_exists($i, $array)){
    //             $phpWord ->setValue('apellidoPa_' . $i, 'NA');
    //             $phpWord ->setValue('fechan_' . $i, 'NA');
    //             $phpWord ->setValue('apellidoMa_' . $i, 'NA');
    //             $phpWord ->setValue('paren23_' . $i,'NA');
    //             $phpWord ->setValue('nom23_' . $i, 'NA');
    //             $phpWord ->setValue('curp23_' . $i,'NA');
    //         }
    //     }
    // }



    //Opcionmultiple23
    if(($data->opcionSeleccionada) =='inclusion' || ($data->opcionSeleccionada) =='ninguno'){

        $array = ($data -> beneficiarios) ? json_decode(json_encode($data->beneficiarios), true) : [];
        
        for($j = 0; $j < 6; $j++){
                $phpWord ->setValue('apellidoPa2_' . $j, 'NA');
                $phpWord ->setValue('fechan2_' . $j, 'NA');
                $phpWord ->setValue('apellidoMa2_' . $j, 'NA');
                $phpWord ->setValue('paren28_' . $j,'NA');
                $phpWord ->setValue('nom28_' . $j, 'NA');
                $phpWord ->setValue('curp28_' . $j,'NA');
        }

        for( $i = 0; $i <6 ; $i++){
            if(array_key_exists($i, $array)){
                $phpWord ->setValue('apellidoPa_' . $i, $array[$i]['apellidoPaterno23']);
                
                if($array[$i]['fechaNacimiento23'] == ''){
                    $mesLetra27 ="NA";
                    }else{
                    $fecha23bb =  ($array[$i]['fechaNacimiento23']);
                        $fechaArray = explode("-", $fecha23bb);
                        $año23 = $fechaArray[0];
                        $mes23 = $fechaArray[1];
                        $dia23 = $fechaArray[2];
            
                    // $meses23 = [
                    //     "01" => "Enero",
                    //     "02" => "Febrero",
                    //     "03" => "Marzo",
                    //     "04" => "Abril",
                    //     "05" => "Mayo",
                    //     "06" => "Junio",
                    //     "07" => "Julio",
                    //     "08" => "Agosto",
                    //     "09" => "Septiembre",
                    //     "10" => "Octubre",
                    //     "11" => "Noviembre",
                    //     "12" => "Diciembre"
                    // ];

                    $mesLetra23 = $dia23 ."-".$mes23."-".$año23;
                }
                $phpWord ->setValue('fechan_' . $i, $mesLetra23);
                $phpWord ->setValue('apellidoMa_' . $i, $array[$i]['apellidoMaterno23']);
                $phpWord ->setValue('paren23_' . $i, $array[$i]['parentesco23']);
                $phpWord ->setValue('nom23_' . $i, $array[$i]['nombre23']);
                $phpWord ->setValue('curp23_' . $i, $array[$i]['curp23']);
            }else{
                $phpWord ->setValue('apellidoPa_' . $i, 'NA');
                $phpWord ->setValue('fechan_' . $i, 'NA');
                $phpWord ->setValue('apellidoMa_' . $i, 'NA');
                $phpWord ->setValue('paren23_' . $i,'NA');
                $phpWord ->setValue('nom23_' . $i, 'NA');
                $phpWord ->setValue('curp23_' . $i,'NA');
                }
            };
        }

        
 //Pregunta 28
    if(($data->opcionSeleccionada) =='modificacion' || ($data->opcionSeleccionada) =='ninguno'){
        
        $array = ($data->beneficiarios2)? json_decode(json_encode($data->beneficiarios2), true) : [];
        for($j = 0; $j < 6; $j++){
                $phpWord ->setValue('apellidoPa_' . $j, 'NA');
                $phpWord ->setValue('fechan_' . $j, 'NA');
                $phpWord ->setValue('apellidoMa_' . $j, 'NA');
                $phpWord ->setValue('paren23_' . $j,'NA');
                $phpWord ->setValue('nom23_' . $j, 'NA');
                $phpWord ->setValue('curp23_' . $j,'NA');
        }

        for($i = 0; $i < 6; $i++){
            if(array_key_exists($i, $array)){
                $phpWord ->setValue('apellidoPa2_' . $i, $array[$i]['apellidoPaterno28']);
                if($array[$i]['fechaNacimiento28'] == ''){
                    $mesLetra27 ="NA";
                    }else{
                    $fecha28bb =  ($array[$i]['fechaNacimiento28']);
                        $fechaArray = explode("-", $fecha28bb);
                        $año28 = $fechaArray[0];
                        $mes28 = $fechaArray[1];
                        $dia28 = $fechaArray[2];
            
                    // $meses28 = [
                    //     "01" => "Enero",
                    //     "02" => "Febrero",
                    //     "03" => "Marzo",
                    //     "04" => "Abril",
                    //     "05" => "Mayo",
                    //     "06" => "Junio",
                    //     "07" => "Julio",
                    //     "08" => "Agosto",
                    //     "09" => "Septiembre",
                    //     "10" => "Octubre",
                    //     "11" => "Noviembre",
                    //     "12" => "Diciembre"
                    // ];

                    $mesLetra28 = $dia28 ."-".$mes28."-".$año28;
                }
                $phpWord ->setValue('fechan2_' . $i,$mesLetra28 );
                $phpWord ->setValue('apellidoMa2_' . $i, $array[$i]['apellidoMaterno28']);
                $phpWord ->setValue('paren28_' . $i, $array[$i]['parentesco28']);
                $phpWord ->setValue('nom28_' . $i, $array[$i]['nombre28']);
                $phpWord ->setValue('curp28_' . $i, $array[$i]['curp28']);
            }else{
                $phpWord ->setValue('apellidoPa2_' . $i, 'NA');
                $phpWord ->setValue('fechan2_' . $i, 'NA');
                $phpWord ->setValue('apellidoMa2_' . $i, 'NA');
                $phpWord ->setValue('paren28_' . $i,'NA');
                $phpWord ->setValue('nom28_' . $i, 'NA');
                $phpWord ->setValue('curp28_' . $i,'NA');
            }
        };
    }

    $impor20 = ($data->importe) ? '$'.($data->importe) : 'NA';
    $salario21 = ($data->salario) ? '$'.($data->salario) : 'NA';
    $semana22 = ($data->semana) ? ($data->semana) :'NA';

    $semana24 = ( $data->semana2) ? ( $data->semana2) : 'NA';
    $sala25 = ($data->salario25) ? '$'.($data->salario25) : 'NA';
    $importe26 = ($data->importe26) ? '$'.($data->importe26) : 'NA';






    $phpWord ->setValue('apellidoPa', $data->apellidoPaterno);
    $phpWord ->setValue('apellidoMa', $data->apellidoMaterno);
    $phpWord ->setValue('nombre', $data->nombre);
    $phpWord ->setValue('curp', $data->curp);
    $phpWord ->setValue('rfc', $data->rfc);
    $phpWord ->setValue('fecha1', $mesLetra1 );
    
    $phpWord ->setValue('apellidoPa2', $data->apellidoPaterno2);
    $phpWord ->setValue('apellidoMa2', $data->apellidoMaterno2);
    $phpWord ->setValue('nomb2', $data->nombre2);
    $phpWord ->setValue('nss', $data->nss);
    $phpWord ->setValue('fecha5', $mesLetra5);
    $phpWord ->setValue('fecha5b', $mesLetra5b);
    $phpWord ->setValue('fecha7',  $mesLetra7);
    $phpWord ->setValue('fecha7b', $mesLetra7b);
    $phpWord ->setValue('expediente', $data->expediente);
    $phpWord ->setValue('decision', $data->decision);
    $phpWord ->setValue('selectedOption',$data->selectedOption);
    $phpWord ->setValue('selectedOption2', $data->selectedOption2);
    $phpWord ->setValue('delegacionSelec', $data->delegacionSelec);
    $phpWord ->setValue('nomSelec', $data->nomSelec);
    $phpWord ->setValue('regiSelec', $data->regiSelec);
    $phpWord ->setValue('selectedOption14', $data->selectedOption14);
    $phpWord ->setValue('tipoSeleccionado', $data->tipoSeleccionado);
    $phpWord ->setValue('importeBruto', $data->importeBruto);
    $phpWord ->setValue('startDate', $fechaInicial16);
    $phpWord ->setValue('endDate', $fechaInicial16b );
    $phpWord ->setValue('motivoA', $opc16a);
    $phpWord ->setValue('motivoB', $opc16b);
    $phpWord ->setValue('motivoC', $opc16c);
    $phpWord ->setValue('banInfo', $data->bancoInfo);
    $phpWord ->setValue('depSelec', $data->depSelec);
    $phpWord ->setValue('uniSelec', $data->uniSelec);
    $phpWord ->setValue('opcionA', $opc17a);
    $phpWord ->setValue('opcionB', $opc17b);
    $phpWord ->setValue('opcionC', $opc17c);
    $phpWord ->setValue('opcionSeleccionada', $data->opcionSeleccionada);
    $phpWord ->setValue('fecha18', $mesLetra18);
    $phpWord ->setValue('fecha19', $mesLetra19);
    $phpWord ->setValue('importe', $impor20);
    $phpWord ->setValue('salario', $salario21);
    $phpWord ->setValue('semana', $semana22);
    $phpWord ->setValue('semana2', $semana24);
    $phpWord ->setValue('salario25',$sala25);
    $phpWord ->setValue('importe26',$importe26);
    $phpWord ->setValue('fecha27', $mesLetra27 );
    $phpWord ->setValue('Op', $data->Op);
    $phpWord ->setValue('opcion29a', $opc29a);
    $phpWord ->setValue('9', $opc29b);
    $phpWord ->setValue('opcion29c', $opc29c);
    $phpWord ->setValue('opc30a', $opc30a);
    $phpWord ->setValue('opc30b', $opc30b);
    $phpWord ->setValue('opc31a', $opc31a);
    $phpWord ->setValue('opc31b', $opc31b);
    $phpWord ->setValue('opc31c', $opc31c);
    $phpWord ->setValue('opc34a', $opc34a);
    $phpWord ->setValue('opc34b', $opc34b);
    $phpWord ->setValue('opcionSeleccionada31', $data->opcionSeleccionada31);
    $phpWord ->setValue('opcionSeleccionada2', $data->opcionSeleccionada2);
    $phpWord ->setValue('Date35a', $opc35a);
    $phpWord ->setValue('Date35b', $opc35b);
    $phpWord ->setValue('Date35c', $opc35c);
    $phpWord ->setValue('diagnostico36', $data->diagnostico36);
    $phpWord ->setValue('diagnostico1', $data->diagnostico1);
    $phpWord ->setValue('valor1', $data->valor1);
    $phpWord ->setValue('diagnostico2', $data->diagnostico2);
    $phpWord ->setValue('valor2', $data->valor2);
    $phpWord ->setValue('diagnostico3', $data->diagnostico3);
    $phpWord ->setValue('valor3', $data->valor3);
    $phpWord ->setValue('diagnostico4', $data->diagnostico4);
    $phpWord ->setValue('valor4', $data->valor4);
    $phpWord ->setValue('diagnostico5', $data->diagnostico5);
    $phpWord ->setValue('valor5', $data->valor5);
    $phpWord ->setValue('diagnostico6', $data->diagnostico6);
    $phpWord ->setValue('valor6', $data->valor6);
    $phpWord ->setValue('diagnostico7', $data->diagnostico7);
    $phpWord ->setValue('valor7', $data->valor7);
    $phpWord ->setValue('sumaTotal', $data->sumaTotal);
    $phpWord ->setValue('observaciones', $data->observaciones);
    $phpWord ->setValue('abogadoSeleccionadoo', $data->abogadoSeleccionadoo);
    $phpWord ->setValue('correoSele', $data->correoSeleccionado);
    $phpWord ->setValue('jefeSeleccionadoo', $data->jefeSeleccionadoo);
    $phpWord ->setValue('correoJeSele', $data->correoJeSeleccionado);
    $phpWord ->setValue('correoDepSele', $data->correoDepSeleccionado);
    $phpWord ->setValue('titSeleccionadoo', $data->titSeleccionadoo);
    $phpWord ->setValue('correoTitSele', $data->correoTitSeleccionado);
    $phpWord ->setValue('group2a', $data->group2a);
    $phpWord ->setValue('group2b',  $data->group2b);
    $phpWord ->setValue('num', $data->num);
    $phpWord ->setValue('num2', $data->num2);
    $phpWord ->setValue('tipoSeleccionadoText', $data->tipoSeleccionadoText);
    $phpWord ->setValue('depSeleccionadoo', $data->depSeleccionadoo);

    $phpWord->saveAs(env('FILE_DIR') . "\MyWordFile_{$id}.docx");
    return env('FILE_DIR') . "\MyWordFile_{$id}.docx";
}