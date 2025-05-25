<?php
    class Tienda {
        //ATRIBUTOS - VARIABLES INSTANCIAS
        private $nombre;
        private $direccion;
        private $telefono;
        private $colProductos;
        private $colVentas;

        //METODO CONSTRUCTOR
        public function __construct($nombre, $direccion, $telefono, $colProductos) {
            $this -> nombre = $nombre;
            $this -> direccion = $direccion;
            $this -> telefono = $telefono;
            $this -> colProductos = $colProductos;
            $this -> colVentas = [];
        }

        //METODOS DE ACCESO GET Y SET
        public function getNombre() {
            return $this -> nombre;
        }   
        public function setNombre($nombre) {
            $this -> nombre = $nombre;
        }
        public function getDireccion() {
            return $this -> direccion;
        }
        public function setDireccion($direccion) {
            $this -> direccion = $direccion;
        }
        public function getTelefono() {
            return $this -> telefono;
        }
        public function setTelefono($telefono) {
            $this -> telefono = $telefono;
        }
        public function getColProductos() {
            return $this -> colProductos;
        }
        public function setColProductos($colProductos) {
            $this -> colProductos = $colProductos;
        }
        public function getColVentas() {
            return $this -> colVentas;
        }
        public function setColVentas($colVentas) {
            $this -> colVentas = $colVentas;
        }
        
        //METODO TOSTRING   
        public function __toString() {
            $arregloProductos = $this -> getColProductos();
            $mensajeProd ="";
            foreach ($arregloProductos as $producto) {
                $mensajeProd .=  $producto . "\n";
            }

            $arregloVentas = $this -> getColVentas();
            $mensajeVentas = "";
            foreach ($arregloVentas as $venta) {
                $mensajeVentas .=  $venta . "\n";
            }
            $mensaje = "\n----Tienda----\n";
            $mensaje .= "Nombre: " . $this -> getNombre() . "\n";
            $mensaje .= "Direccion: " . $this -> getDireccion() . "\n";
            $mensaje .= "Telefono: " . $this -> getTelefono() . "\n";
            $mensaje .= "Coleccion de Productos: " . $mensajeProd . "\n";
            $mensaje .= "Coleccion de ventas: " . $mensajeVentas . "\n";
            
            

            return $mensaje;

        }

        /** Implementar el método buscarProducto que dado un código de barra por parámetro, retorna la referencia
         *a un objeto producto con ese código de barra. En caso de no encontrar el código de barra en la colección
         *de productos retornar null.  
         *@param int $codigoBarra
         *@return object $refProducto
        */
        public function buscarProducto($codigoBarra) {
            $arregloProductos = $this -> getColProductos();
            $cantArreglo = count($arregloProductos);
            $i = 0;
            $retorno = null;
            $encontrado = false;
            while ($i < $cantArreglo && !$encontrado) {
               $codBarra = $arregloProductos[$i] -> getCodigoBarra();

               if ($codBarra === $codigoBarra) {
                $objProducto = $arregloProductos[$i];
                $retorno = $objProducto;
               }
               $i++;
            }
            return $retorno;

        }

        /** Implementar el metodo realizarVenta que recibe por parámetro un arreglo asociativo con las siguientes
         *claves:”codigoBarra” (código barra correspondiente a un producto) y “cantidad” (cantidad de ejemplares del
         *producto  que desea venderse).  El procedimiento debe buscar los productos según el código de barra, ve
         *rificar el stock disponible y realizar el registro de la venta en caso de ser posible. El procedimiento debe re
         *tornar un objeto Venta con los ítem correspondientes a aquellos producto que pudo vender. En la imple
         *mentación del método deben utilizarse los siguientes métodos: buscarProducto , incorporarProducto,
         *actualizarStock.  
        */

        public function realizarVenta($arrayProducto){
            $retorno = false;
            $arrayVentasRealizadas = $this -> getColVentas();
            $incorporado = false;

            $fecha = date("Y-M-D");
            $denominacionCliente = "FA-03";
            $numFactura = count($this -> getColVentas()) + 1;
            $tipoComprobante = "A";
            $nuevaVenta = new Venta($fecha, $denominacionCliente, $numFactura, $tipoComprobante);
            foreach ($arrayProducto as $producto) {
                
                $prodCodigoBarra = $producto["codigoBarra"];
                $prodCantidad = $producto["cantidad"];
                
                $objProducto = $this -> buscarProducto($prodCodigoBarra);
                
                if ($objProducto != null) {
                    $incorporado = $nuevaVenta -> incorporarProducto($objProducto, $prodCantidad);  
                    if ($incorporado) {
                        $retorno = true;
                    }               
                    
                }
            }

            if ($retorno) {
                $arrayVentasRealizadas[] = $nuevaVenta;
                $this -> setColVentas($arrayVentasRealizadas);
                $retorno = $nuevaVenta;
            }

            return $retorno;
        }





    }



?>