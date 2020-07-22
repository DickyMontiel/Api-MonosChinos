<?php
    /*
        ------------------------------------------------------------------------------------
        -------                                                                      -------
        -------                          By DickyMontiel                             -------
        -------                                                                      -------
        ------------------------------------------------------------------------------------
    
        Visita mi canal de youtube para saber como usar las apis, y suscribete para no perderte
        de nuevas ayudas para tu programa ;)
        https://www.youtube.com/channel/UCTDilMoOGFanqQLwWSZLJAw

        -------------------------------------------------------------------
        ------------------------ INSTRUCCIONES ----------------------------
        -------------------------------------------------------------------

        El video de como se usa: https://youtu.be/dcVTRdjRXSU
    */

    class ApiMonosChinos{
        private $link;
        private $resource;

        private $number;
        private $video;
        
        public function sourceCodeAMC(){
            $ch =   curl_init();
                    curl_setopt($ch, CURLOPT_URL, $this->link);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $this->resource = str_replace("\n", "", curl_exec($ch));
        }
        
        public function errorVerifyAMC(){
            if(strpos($this->resource, "<h1>404 Not Found</h1>")){
                return false;
            }else{
                return true;
            }
        }
        
        public function iframeAMC(){
            preg_match_all('/<iframe class="embed-responsive-item" scrolling="no" width="560" height="315" src="(.*)" frameborder="0" allowfullscreen>/', $this->resource, $matches);
            preg_match_all("/https:\/\/www.monoschinos.com\/reproductor\?url=(.*)&id=/", $matches[1][0], $matches);
            
            $this->video = urldecode($matches[1][0]);
        }

        public function setLinkAMC($link){
            $this->link = $link;
            $array = explode("-", $link);
            $this->number = end($array);
        }

        public function getResourceAMC(){
            return $this->resource;
        }

        public function getVideoAMC(){
            return $this->video;
        }
    }