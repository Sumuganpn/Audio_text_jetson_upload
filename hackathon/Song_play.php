<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAY SONG</title>
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/bootstrap.min.css"
    />
    <style>
        /* @media screen and (prefers-color-scheme: dark) {
        body,
        input {
          color: #f1f1f1;
        }
        body {
          background: #171717;
        }
        .search-bar input {
          box-shadow: 0 0 0 0.4em #f1f1f1 inset;
        }
        .search-bar input:focus,
        .search-bar input:valid {
          background: #3d3d3d;
          box-shadow: 0 0 0 0.1em #3d3d3d inset;
        }
        .search-btn {
          background: #f1f1f1;
        }
      } */

      @import url(https://fonts.googleapis.com/css?family=Orbitron);
      

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        -webkit-tap-highlight-color: transparent;
      }

      html {
        font-size: 16px;
        overflow: hidden;
      }

      body {
        background-color: #131418;
        font-family: "Orbitron", courier, sans-serif;
        width: 100vw;
        height: 100vh;
        display: grid;
        /* place-items: center; */
        min-height: 10em;
        display: table-cell;
        vertical-align: middle;
        user-select: none;
      }

      .themes {
        position: absolute;
        top: -100px;
        width: 100%;
        height: 6rem;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        transition: 0.3s;
      }

      .theme {
        width: 3rem;
        height: 3rem;
        border: 1px solid #888888;
        border-radius: 50%;
        cursor: pointer;
        transition: 0.3s;
      }

      .theme:hover {
        border: 1px solid #0cb18d;
      }

      .active-theme {
        border: 1px solid #11e2b5 !important;
      }

      .theme1 {
        background: #101010;
      }

      .theme2 {
        background: linear-gradient(135deg, #dc143c, #009688);
      }

      .theme3 {
        background: linear-gradient(135deg, #7f0096, #14abdc);
      }

      .vertical {
            border-left: 6px solid rgb(175, 175, 175);
            height: 500px;
            position:absolute;
            left: 50%;
        }

      .music-box {
        margin-left: 180px;
        width: 30rem;
        height: 30rem;
        position: relative;
        border-radius: 16%;
        border: 1px solid transparent;
        box-shadow: -10px -10px 15px rgb(152, 152, 152), 10px 10px 15px rgb(152, 152, 152);
        display: grid;
        grid-template-columns: 50% 50%;
        grid-template-rows: 55% 10% 10% 25%;
      }

      .right-side {
        /* border: 8px solid #ffffff; */
        position: absolute;
        right: 200px;
        width: 500px;
        padding: 15px;
      }

      .blur {
        width: 30rem;
        height: 30rem;
        border-radius: 16%;
        position: absolute;
        filter: blur(10px);
        z-index: -1;
      }

      .cover-wrapper {
        display: grid;
        place-items: center;
        padding: 25px;
      }

      .cover-image {
        width: 100% ;
        aspect-ratio: 1 / 1;
        border-radius: 17%;
        cursor: pointer;
        background: #10101075;
      }

      .cover-image-big-size {
        position: absolute;
        width: 28rem;
        height: 28rem;
        border-radius: 11%;
        box-shadow: -10px -10px 15px #00000080, 10px 10px 15px #0000001f;
        cursor: pointer;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: 0.3s;
      }

      .queue {
        color: white;
        font-size: 1.3rem;
        letter-spacing: 1px;
        padding: 25px 0;
        overflow: hidden;
      }

      .queue .active {
        transform: scale(1.1);
        color: #0fd5ca;
      }

      .queue .track-item {
        transition: 0.1s;
        cursor: pointer;
        margin-left: 45px;
        text-indent: -28px;
      }

      .queue .track-item:hover {
        transform: scale(1.1);
      }

      .track-items-wrapper {
        scrollbar-width: none;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
      }

      .queue .track-item:first-child {
        margin-top: 18px;
      }

      .track-items-wrapper::-webkit-scrollbar {
        width: 0;
        background: transparent;
      }

      .track-information {
        font-family: "Noto Sans JP";
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        color: #adadad;
        grid-column-start: span 2;
      }

      .track-information > * {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        cursor: pointer;
        transition: 0.3s;
      }

      path {
        transition: 0.3s;
      }

      .track-information > *:hover {
        color: white;
      }

      .track-information > *:hover path {
        fill: white !important;
      }

      .track-information-icon {
        width: 2.5rem;
        height: 2.5rem;
      }

      .track-information-texts {
        width: 7rem;
      }

      .track-progress {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        grid-column-start: span 2;
      }

      .track-progress-bar {
        width: 65%;
        height: 10px;
        background: #dc143c7a;
        border-radius: 4px;
        overflow: hidden;
        cursor: pointer;
        position: relative;
      }

      .track-loading {
        width: 35px;
        height: 100%;
        background: #dc143c;
        position: absolute;
        border-radius: 4px;
        animation: track-loading 1s ease-in-out infinite alternate;
        left: -5px;
        transform: scaleX(1);
      }

      @keyframes track-loading {
        25% {
          transform: scaleX(1.5);
        }
        75% {
          transform: scaleX(1.5);
        }
        100% {
          transform: scaleX(1);
          left: calc(100% - 30px);
        }
      }

      .track-current-time-progress-bar {
        width: 0;
        height: 10px;
        background-color: #dc143c;
        border-radius: 4px;
      }

      .track-time {
        color: white;
        margin-bottom: 4px;
        width: 28px;
      }

      .buttons {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        grid-column-start: span 2;
      }

      .button {
        width: 4.6rem;
        height: 4.6rem;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        position: relative;
        transition: 0.3s;
      }

      .button > * {
        width: 2.5rem;
        height: 100%;
        transition: 0.3s;
      }

      .volume-wrapper > * {
        position: absolute;
        width: 100%;
      }

      .volume-button > * {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .volume-button img,
      .volume-button svg {
        width: 2.5rem;
        height: 2.5rem;
        position: absolute;
      }

      .waves-volume-button > * {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .volume-number {
        color: white;
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 6px;
        opacity: 0;
      }

      .volume-cross {
        opacity: 0;
      }

      .volume-cross svg {
        transform: translateX(2px);
      }

      .volume-wrapper:hover .volume-button {
        opacity: 0 !important;
      }

      .volume-wrapper:hover .volume-number {
        opacity: 1 !important;
      }

      @media screen and (max-width: 575px) {
        html {
          font-size: 13px;
        }
      }
      @media screen and (max-width: 460px) {
        html {
          font-size: 10px;
        }
      }

      .glowing {
        text-align: center;
        color: rgba(0, 230, 215, 0.3);
        text-shadow: 0 0 1px rgba(21, 112, 99, 0.932);

        height: 40px; 
        border-radius: 25px;
        border-style: solid;
        border-color: white;
        
        background: -webkit-linear-gradient(transparent, transparent),
          url(https://i.imgur.com/WyMyxQ6.png) repeat;
        /* clipping webkit magic */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        /* Animation */
        -webkit-animation: glow 1s infinite alternate;
        -moz-animation: glow 1s infinite alternate;
        animation: glow 1s infinite alternate;
        -webkit-animation-timing-function: cubic-bezier(1, 0.3, 0.79, 0.81);
        -moz-animation-timing-function: cubic-bezier(1, 0.3, 0.79, 0.81);
        animation-timing-function: cubic-bezier(1, 0.3, 0.79, 0.81);
      }
      @-webkit-keyframes glow {
        100% {
          text-shadow: 0 0 2px rgba(255, 255, 255, 0.1),
            0 0 5px rgba(255, 255, 255, 0.1), 0 0 10px rgba(157, 208, 154, 0.3);
        }
      }

      @-moz-keyframes glow {
        100% {
          text-shadow: 0 0 2px rgba(255, 255, 255, 0.1),
            0 0 5px rgba(255, 255, 255, 0.1), 0 0 10px rgba(157, 208, 154, 0.3);
        }
      }

      @keyframes glow {
        100% {
          text-shadow: 0 0 2px rgba(255, 255, 255, 0.1),
            0 0 5px rgba(255, 255, 255, 0.1), 0 0 10px rgba(157, 208, 154, 0.3);
        }
      }

      
    </style>
</head>
<body>

</body>
</html>

<?php
$songFolder = 'uploads/audio/';
$songtextfolder = 'uploads/audiotext/';
$con = new PDO("mysql:host=localhost;dbname=hopekelldev",'root','');

if (isset($_POST["submit"])) 
  {
      $str = $_POST["search"];
      $sth = $con->prepare("SELECT * FROM `upload_songs` WHERE songName = '$str' ");

      $sth->setFetchMode(PDO:: FETCH_OBJ);
      $sth -> execute();
    
      if($row = $sth->fetch())
      {
        ?>          
            <?php 
              $file_url = $songFolder. $row->songFile;
              $file_text = $songtextfolder. $row->songText;
              $myfile = fopen("$file_text", "r") or die("Unable to open file!");
            ?>
            
            <body>  
            <h3 class = "glowing"
               style="color: white; 
                      text-align: center;
                      border-radius: 25px;
                      border-style: solid;
                      border-color: white;
                      position:relative;
                      left:0px; 
                      top:-70px;
                      ">
                      
                      PLAY THE AUDIO AND SEE AUDIO TEXT 
      </h3>
            <div class = "vertical" ></div>
            <section class="right-side" id="right-side" style="color: white; font-size: smaller">
                     <?php echo fread($myfile,filesize("$file_text")); ?>
            </section>

              <section class="music-box" id="musicBox">
                <div class="blur" id="blurElement"></div>
                <div class="themes" id="themes">
                </div>
                <section class="cover-wrapper">
                  <img
                    class="cover-image"
                    id="coverImage"
                    src=""
                    alt="🎵 Cover Image 🎵"
                    srcset=""
                    height = 230px ;
                  />
                </section>
                <section class="queue">
                  <div class="track-items-wrapper" id="trackItemsWrapper"></div>
                </section>
                <section class="track-information">
                  <div>
                    <svg
                      version="1.1"
                      width="480.79175"
                      height="424.00003"
                      x="0"
                      y="0"
                      viewBox="0 0 480.79175 424.00003"
                      xml:space="preserve"
                      class="track-information-icon"
                      id="svg13"
                      sodipodi:docname="artist.svg"
                      inkscape:version="1.2.1 (9c6d41e410, 2022-07-14)"
                      xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                      xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:svg="http://www.w3.org/2000/svg"
                    >
                      <defs id="defs17" />
                      <sodipodi:namedview
                        id="namedview15"
                        pagecolor="#ffffff"
                        bordercolor="#000000"
                        borderopacity="0.25"
                        inkscape:showpageshadow="2"
                        inkscape:pageopacity="0.0"
                        inkscape:pagecheckerboard="0"
                        inkscape:deskcolor="#d1d1d1"
                        showgrid="false"
                        inkscape:zoom="0.4609375"
                        inkscape:cx="241.89831"
                        inkscape:cy="184.40678"
                        inkscape:window-width="1440"
                        inkscape:window-height="837"
                        inkscape:window-x="-8"
                        inkscape:window-y="-8"
                        inkscape:window-maximized="1"
                        inkscape:current-layer="outline"
                      />
                      <g
                        id="g11"
                        style="fill: #adadad"
                        transform="translate(-15.998759,-71.999977)"
                      >
                        <g id="outline" style="fill: #adadad">

                        </g>
                      </g>
                    </svg>

                    <div class="track-information-texts" id="trackArtistName"></div>
                  </div>
                  <div>
                    <svg
                      version="1.1"
                      width="512"
                      height="512"
                      x="0"
                      y="0"
                      viewBox="0 0 128 128"
                      xml:space="preserve"
                      class="track-information-icon"
                      id="svg10"
                      sodipodi:docname="album.svg"
                      style="enable-background: new 0 0 512 512"
                      inkscape:version="1.2.1 (9c6d41e410, 2022-07-14)"
                      xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                      xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:svg="http://www.w3.org/2000/svg"
                    >
                      <defs id="defs14" />
                      <sodipodi:namedview
                        id="namedview12"
                        pagecolor="#ffffff"
                        bordercolor="#000000"
                        borderopacity="0.25"
                        inkscape:showpageshadow="2"
                        inkscape:pageopacity="0.0"
                        inkscape:pagecheckerboard="0"
                        inkscape:deskcolor="#d1d1d1"
                        showgrid="false"
                        inkscape:zoom="1.3037281"
                        inkscape:cx="239.69721"
                        inkscape:cy="310.64759"
                        inkscape:window-width="1440"
                        inkscape:window-height="837"
                        inkscape:window-x="-8"
                        inkscape:window-y="-8"
                        inkscape:window-maximized="1"
                        inkscape:current-layer="g6"
                      />
                      <g
                        id="g8"
                        style="fill: #adadad"
                        transform="matrix(1.1226926,0,0,1.1226926,-7.7232168,-8.2621092)"
                      >
                        <g id="g6" style="fill: #adadad">
                          
                      </g>
                    </svg>

                    <div class="track-information-texts" id="trackAlbumName"></div>
                  </div>
                </section>
                <section class="track-progress">
                  <div class="track-time" id="currentTrackTimeNumber">0:00</div>
                  <div class="track-progress-bar" id="trackProgressBar">
                    <div id="trackLoading"></div>
                    <div
                      class="track-current-time-progress-bar"
                      id="currentTrackTimeBar"
                    ></div>
                  </div>
                  <div class="track-time" id="currentTrackDuration">0:00</div>
                </section>
                <section class="buttons">
                  <div class="button" id="previousButton">
                    <svg
                      version="1.1"
                      width="549.64148"
                      height="512.31622"
                      x="0"
                      y="0"
                      viewBox="0 0 49.403337 46.048437"
                      xml:space="preserve"
                      class=""
                      id="svg40"
                      sodipodi:docname="next.svg.2022_09_13_01_11_39.0 - Copy.svg"
                      inkscape:version="1.2.1 (9c6d41e410, 2022-07-14)"
                      xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                      xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:svg="http://www.w3.org/2000/svg"
                    >
                      <defs id="defs44" />
                      <sodipodi:namedview
                        id="namedview42"
                        pagecolor="#ffffff"
                        bordercolor="#000000"
                        borderopacity="0.25"
                        inkscape:showpageshadow="2"
                        inkscape:pageopacity="0.0"
                        inkscape:pagecheckerboard="0"
                        inkscape:deskcolor="#d1d1d1"
                        showgrid="false"
                        inkscape:zoom="0.39333333"
                        inkscape:cx="279.66102"
                        inkscape:cy="264.40678"
                        inkscape:window-width="1440"
                        inkscape:window-height="837"
                        inkscape:window-x="-8"
                        inkscape:window-y="-8"
                        inkscape:window-maximized="1"
                        inkscape:current-layer="svg40"
                      />
                      <g
                        id="g38"
                        style="fill: #ffffff"
                        transform="matrix(-1,0,0,1,36.965131,0.02843878)"
                      >
                        <g id="g6" style="fill: #ffffff">
                          <g id="g4" style="fill: #ffffff">
                            <path
                              d="m 14.757,46.02 c -1.412,0 -2.825,-0.521 -3.929,-1.569 -2.282,-2.17 -2.373,-5.78 -0.204,-8.063 L 23.382,22.97 10.637,9.645 C 8.46,7.37 8.54,3.76 10.816,1.582 c 2.277,-2.178 5.886,-2.097 8.063,0.179 l 16.505,17.253 c 2.104,2.2 2.108,5.665 0.013,7.872 L 18.893,44.247 c -1.123,1.177 -2.626,1.773 -4.136,1.773 z"
                              fill="#ffffff"
                              data-original="#000000"
                              id="path2"
                              style="fill: #ffffff"
                            />
                          </g>
                        </g>
                        <g id="g8" style="fill: #ffffff"></g>
                        <g id="g10" style="fill: #ffffff"></g>
                        <g id="g12" style="fill: #ffffff"></g>
                        <g id="g14" style="fill: #ffffff"></g>
                        <g id="g16" style="fill: #ffffff"></g>
                        <g id="g18" style="fill: #ffffff"></g>
                        <g id="g20" style="fill: #ffffff"></g>
                        <g id="g22" style="fill: #ffffff"></g>
                        <g id="g24" style="fill: #ffffff"></g>
                        <g id="g26" style="fill: #ffffff"></g>
                        <g id="g28" style="fill: #ffffff"></g>
                        <g id="g30" style="fill: #ffffff"></g>
                        <g id="g32" style="fill: #ffffff"></g>
                        <g id="g34" style="fill: #ffffff"></g>
                        <g id="g36" style="fill: #ffffff"></g>
                      </g>
                      <g
                        id="g38-4"
                        style="fill: #ffffff"
                        transform="matrix(-1,0,0,1,58.458378,1.7267946e-4)"
                      >
                        <g id="g6-1" style="fill: #ffffff">
                          <g id="g4-3" style="fill: #ffffff">
                            <path
                              d="m 14.757,46.02 c -1.412,0 -2.825,-0.521 -3.929,-1.569 -2.282,-2.17 -2.373,-5.78 -0.204,-8.063 L 23.382,22.97 10.637,9.645 C 8.46,7.37 8.54,3.76 10.816,1.582 c 2.277,-2.178 5.886,-2.097 8.063,0.179 l 16.505,17.253 c 2.104,2.2 2.108,5.665 0.013,7.872 L 18.893,44.247 c -1.123,1.177 -2.626,1.773 -4.136,1.773 z"
                              fill="#ffffff"
                              data-original="#000000"
                              id="path2-8"
                              style="fill: #ffffff"
                            />
                          </g>
                        </g>
                        <g id="g8-2" style="fill: #ffffff"></g>
                        <g id="g10-1" style="fill: #ffffff"></g>
                        <g id="g12-1" style="fill: #ffffff"></g>
                        <g id="g14-4" style="fill: #ffffff"></g>
                        <g id="g16-0" style="fill: #ffffff"></g>
                        <g id="g18-8" style="fill: #ffffff"></g>
                        <g id="g20-2" style="fill: #ffffff"></g>
                        <g id="g22-3" style="fill: #ffffff"></g>
                        <g id="g24-3" style="fill: #ffffff"></g>
                        <g id="g26-8" style="fill: #ffffff"></g>
                        <g id="g28-1" style="fill: #ffffff"></g>
                        <g id="g30-3" style="fill: #ffffff"></g>
                        <g id="g32-8" style="fill: #ffffff"></g>
                        <g id="g34-2" style="fill: #ffffff"></g>
                        <g id="g36-2" style="fill: #ffffff"></g>
                      </g>
                    </svg>
                  </div>
                  <div class="button" id="playButton">
                    <svg
                      version="1.1"
                      width="512"
                      height="512"
                      x="0"
                      y="0"
                      viewBox="0 0 32 32"
                      xml:space="preserve"
                      class=""
                      id="svg7"
                      sodipodi:docname="play.svg"
                      inkscape:version="1.2.1 (9c6d41e410, 2022-07-14)"
                      xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                      xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:svg="http://www.w3.org/2000/svg"
                    >
                      <defs id="defs11" />
                      <sodipodi:namedview
                        id="namedview9"
                        pagecolor="#ffffff"
                        bordercolor="#000000"
                        borderopacity="0.25"
                        inkscape:showpageshadow="2"
                        inkscape:pageopacity="0.0"
                        inkscape:pagecheckerboard="0"
                        inkscape:deskcolor="#d1d1d1"
                        showgrid="false"
                        inkscape:zoom="0.70710678"
                        inkscape:cx="277.89296"
                        inkscape:cy="246.07316"
                        inkscape:window-width="1440"
                        inkscape:window-height="837"
                        inkscape:window-x="-8"
                        inkscape:window-y="-8"
                        inkscape:window-maximized="1"
                        inkscape:current-layer="svg7"
                      />
                      <g
                        id="g411"
                        transform="matrix(1.1428832,0,0,1.1428832,-1.3924967,-2.2857665)"
                        style="fill: #ffffff"
                      >
                        <g id="g409" data-name="01-Play" style="fill: #ffffff">
                          <path
                            d="M 26.17,12.37 9,2.45 A 3.23,3.23 0 0 0 7.38,2 3.38,3.38 0 0 0 4,5.38 v 21.29 a 3.33,3.33 0 0 0 5.1,2.82 L 26.29,18.63 a 3.65,3.65 0 0 0 -0.12,-6.26 z"
                            fill="#ffffff"
                            data-original="#000000"
                            id="path407"
                            style="fill: #ffffff"
                          />
                        </g>
                      </g>
                    </svg>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      version="1.1"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      width="512"
                      height="512"
                      x="0"
                      y="0"
                      viewBox="0 0 47.607 47.607"
                      style="
                        enable-background: new 0 0 512 512;
                        opacity: 0;
                        position: absolute;
                      "
                      xml:space="preserve"
                      class=""
                    >
                      <g>
                        <g xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M17.991,40.976c0,3.662-2.969,6.631-6.631,6.631l0,0c-3.662,0-6.631-2.969-6.631-6.631V6.631C4.729,2.969,7.698,0,11.36,0   l0,0c3.662,0,6.631,2.969,6.631,6.631V40.976z"
                            fill="#ffffff"
                            data-original="#000000"
                          ></path>
                          <path
                            d="M42.877,40.976c0,3.662-2.969,6.631-6.631,6.631l0,0c-3.662,0-6.631-2.969-6.631-6.631V6.631   C29.616,2.969,32.585,0,36.246,0l0,0c3.662,0,6.631,2.969,6.631,6.631V40.976z"
                            fill="#ffffff"
                            data-original="#000000"
                          ></path>
                        </g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                        <g xmlns="http://www.w3.org/2000/svg"></g>
                      </g>
                    </svg>
                  </div>
                  <div class="button" id="nextButton">
                    <svg
                      version="1.1"
                      width="549.64148"
                      height="512.31622"
                      x="0"
                      y="0"
                      viewBox="0 0 49.403337 46.048437"
                      xml:space="preserve"
                      class=""
                      id="svg40"
                      sodipodi:docname="next.svg.2022_09_13_01_11_39.0.svg"
                      inkscape:version="1.2.1 (9c6d41e410, 2022-07-14)"
                      xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                      xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:svg="http://www.w3.org/2000/svg"
                    >
                      <defs id="defs44" />
                      <sodipodi:namedview
                        id="namedview42"
                        pagecolor="#ffffff"
                        bordercolor="#000000"
                        borderopacity="0.25"
                        inkscape:showpageshadow="2"
                        inkscape:pageopacity="0.0"
                        inkscape:pagecheckerboard="0"
                        inkscape:deskcolor="#d1d1d1"
                        showgrid="false"
                        inkscape:zoom="0.39333333"
                        inkscape:cx="277.11865"
                        inkscape:cy="264.40678"
                        inkscape:window-width="1440"
                        inkscape:window-height="837"
                        inkscape:window-x="-8"
                        inkscape:window-y="-8"
                        inkscape:window-maximized="1"
                        inkscape:current-layer="svg40"
                      />
                      <g
                        id="g38"
                        style="fill: #ffffff"
                        transform="translate(12.438204,0.02843878)"
                      >
                        <g id="g6" style="fill: #ffffff">
                          <g id="g4" style="fill: #ffffff">
                            <path
                              d="m 14.757,46.02 c -1.412,0 -2.825,-0.521 -3.929,-1.569 -2.282,-2.17 -2.373,-5.78 -0.204,-8.063 L 23.382,22.97 10.637,9.645 C 8.46,7.37 8.54,3.76 10.816,1.582 c 2.277,-2.178 5.886,-2.097 8.063,0.179 l 16.505,17.253 c 2.104,2.2 2.108,5.665 0.013,7.872 L 18.893,44.247 c -1.123,1.177 -2.626,1.773 -4.136,1.773 z"
                              fill="#ffffff"
                              data-original="#000000"
                              id="path2"
                              style="fill: #ffffff"
                            />
                          </g>
                        </g>
                        <g id="g8" style="fill: #ffffff"></g>
                        <g id="g10" style="fill: #ffffff"></g>
                        <g id="g12" style="fill: #ffffff"></g>
                        <g id="g14" style="fill: #ffffff"></g>
                        <g id="g16" style="fill: #ffffff"></g>
                        <g id="g18" style="fill: #ffffff"></g>
                        <g id="g20" style="fill: #ffffff"></g>
                        <g id="g22" style="fill: #ffffff"></g>
                        <g id="g24" style="fill: #ffffff"></g>
                        <g id="g26" style="fill: #ffffff"></g>
                        <g id="g28" style="fill: #ffffff"></g>
                        <g id="g30" style="fill: #ffffff"></g>
                        <g id="g32" style="fill: #ffffff"></g>
                        <g id="g34" style="fill: #ffffff"></g>
                        <g id="g36" style="fill: #ffffff"></g>
                      </g>
                      <g
                        id="g38-4"
                        style="fill: #ffffff"
                        transform="translate(-9.0550423,1.7267946e-4)"
                      >
                        <g id="g6-1" style="fill: #ffffff">
                          <g id="g4-3" style="fill: #ffffff">
                            <path
                              d="m 14.757,46.02 c -1.412,0 -2.825,-0.521 -3.929,-1.569 -2.282,-2.17 -2.373,-5.78 -0.204,-8.063 L 23.382,22.97 10.637,9.645 C 8.46,7.37 8.54,3.76 10.816,1.582 c 2.277,-2.178 5.886,-2.097 8.063,0.179 l 16.505,17.253 c 2.104,2.2 2.108,5.665 0.013,7.872 L 18.893,44.247 c -1.123,1.177 -2.626,1.773 -4.136,1.773 z"
                              fill="#ffffff"
                              data-original="#000000"
                              id="path2-8"
                              style="fill: #ffffff"
                            />
                          </g>
                        </g>
                        <g id="g8-2" style="fill: #ffffff"></g>
                        <g id="g10-1" style="fill: #ffffff"></g>
                        <g id="g12-1" style="fill: #ffffff"></g>
                        <g id="g14-4" style="fill: #ffffff"></g>
                        <g id="g16-0" style="fill: #ffffff"></g>
                        <g id="g18-8" style="fill: #ffffff"></g>
                        <g id="g20-2" style="fill: #ffffff"></g>
                        <g id="g22-3" style="fill: #ffffff"></g>
                        <g id="g24-3" style="fill: #ffffff"></g>
                        <g id="g26-8" style="fill: #ffffff"></g>
                        <g id="g28-1" style="fill: #ffffff"></g>
                        <g id="g30-3" style="fill: #ffffff"></g>
                        <g id="g32-8" style="fill: #ffffff"></g>
                        <g id="g34-2" style="fill: #ffffff"></g>
                        <g id="g36-2" style="fill: #ffffff"></g>
                      </g>
                    </svg>
                  </div>
                  <div class="button volume-wrapper" id="volumeWrapper">
                    <div class="volume-number" id="volumeNumber">100</div>
                    <div class="volume-button" id="volumeButton">
                      <div class="main-volume-button">
                        <svg
                          version="1.1"
                          width="474.216"
                          height="418.98331"
                          x="0"
                          y="0"
                          viewBox="0 0 59.277 52.372913"
                          xml:space="preserve"
                          class=""
                          id="svg10"
                          sodipodi:docname="volume - Copy.svg"
                          inkscape:version="1.2.1 (9c6d41e410, 2022-07-14)"
                          xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                          xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                          xmlns="http://www.w3.org/2000/svg"
                          xmlns:svg="http://www.w3.org/2000/svg"
                        >
                          <defs id="defs14" />
                          <sodipodi:namedview
                            id="namedview12"
                            pagecolor="#ffffff"
                            bordercolor="#000000"
                            borderopacity="0.25"
                            inkscape:showpageshadow="2"
                            inkscape:pageopacity="0.0"
                            inkscape:pagecheckerboard="0"
                            inkscape:deskcolor="#d1d1d1"
                            showgrid="false"
                            inkscape:zoom="0.4609375"
                            inkscape:cx="238.64407"
                            inkscape:cy="210.44068"
                            inkscape:window-width="1440"
                            inkscape:window-height="837"
                            inkscape:window-x="-8"
                            inkscape:window-y="-8"
                            inkscape:window-maximized="1"
                            inkscape:current-layer="g6"
                          />
                          <g
                            id="g6"
                            style="fill: #666666"
                            transform="translate(-2.361,-5.814087)"
                          >
                            <path
                              d="M 42.75,6.963 C 39.885,5.369 36.405,5.437 33.593,7.146 l -14.232,8.693 h -7.205 c -5.401,0 -9.795,4.394 -9.795,9.795 v 12.728 c 0,5.386 4.394,9.768 9.795,9.768 h 7.205 l 14.22,8.685 c 1.446,0.897 3.079,1.372 4.721,1.372 1.519,0 3.057,-0.409 4.447,-1.182 2.916,-1.619 4.657,-4.583 4.657,-7.928 V 14.891 C 47.408,11.532 45.716,8.646 42.75,6.963 Z M 17.924,44.129 h -5.767 c -3.195,0 -5.795,-2.587 -5.795,-5.768 V 25.634 c 0,-3.195 2.6,-5.795 5.795,-5.795 h 5.767 z m 25.484,4.947 c 0,1.898 -0.947,3.514 -2.6,4.432 -1.672,0.929 -3.509,0.904 -5.129,-0.101 l -13.754,-8.4 V 18.961 l 13.75,-8.399 c 1.621,-0.984 3.494,-1.013 5.117,-0.111 1.687,0.958 2.616,2.534 2.616,4.44 z"
                              fill="#ffffff"
                              data-original="#000000"
                              id="path2"
                              style="fill: #ffffff"
                              sodipodi:nodetypes="cccssssccscscccssssccsccccccss"
                            />
                          </g>
                        </svg>
                      </div>
                      <div class="waves-volume-button" id="wavesVolumeButton">
                        <div class="low-volume-button">
                          <svg
                            version="1.1"
                            width="474.216"
                            height="418.98331"
                            x="0"
                            y="0"
                            viewBox="0 0 59.277 52.372913"
                            xml:space="preserve"
                            class=""
                            id="svg10"
                            sodipodi:docname="volume - Copy (2).svg"
                            inkscape:version="1.2.1 (9c6d41e410, 2022-07-14)"
                            xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                            xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:svg="http://www.w3.org/2000/svg"
                          >
                            <defs id="defs14" />
                            <sodipodi:namedview
                              id="namedview12"
                              pagecolor="#ffffff"
                              bordercolor="#000000"
                              borderopacity="0.25"
                              inkscape:showpageshadow="2"
                              inkscape:pageopacity="0.0"
                              inkscape:pagecheckerboard="0"
                              inkscape:deskcolor="#d1d1d1"
                              showgrid="false"
                              inkscape:zoom="0.4609375"
                              inkscape:cx="238.64407"
                              inkscape:cy="210.44068"
                              inkscape:window-width="1440"
                              inkscape:window-height="837"
                              inkscape:window-x="-8"
                              inkscape:window-y="-8"
                              inkscape:window-maximized="1"
                              inkscape:current-layer="g6"
                            />
                            <g
                              id="g6"
                              style="fill: #666666"
                              transform="translate(-2.361,-5.814087)"
                            >
                              <path
                                d="m 55.482,39.258 c -0.789,-0.774 -2.056,-0.763 -2.828,0.027 -0.773,0.789 -0.761,2.056 0.028,2.828 l 1.389,1.361 c 0.389,0.382 0.895,0.572 1.4,0.572 0.519,0 1.037,-0.2 1.428,-0.6 0.773,-0.789 0.761,-2.056 -0.028,-2.828 z"
                                fill="#ffffff"
                                data-original="#000000"
                                id="lowVolumeSymbol"
                                style="fill: #ffffff"
                                sodipodi:nodetypes="ccccsccc"
                              />
                            </g>
                          </svg>
                        </div>
                        <div class="medium-volume-button">
                          <svg
                            version="1.1"
                            width="474.216"
                            height="418.98331"
                            x="0"
                            y="0"
                            viewBox="0 0 59.277 52.372913"
                            xml:space="preserve"
                            class=""
                            id="svg10"
                            sodipodi:docname="volume - Copy (3).svg"
                            inkscape:version="1.2.1 (9c6d41e410, 2022-07-14)"
                            xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                            xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:svg="http://www.w3.org/2000/svg"
                          >
                            <defs id="defs14" />
                            <sodipodi:namedview
                              id="namedview12"
                              pagecolor="#ffffff"
                              bordercolor="#000000"
                              borderopacity="0.25"
                              inkscape:showpageshadow="2"
                              inkscape:pageopacity="0.0"
                              inkscape:pagecheckerboard="0"
                              inkscape:deskcolor="#d1d1d1"
                              showgrid="false"
                              inkscape:zoom="0.4609375"
                              inkscape:cx="238.64407"
                              inkscape:cy="210.44068"
                              inkscape:window-width="1440"
                              inkscape:window-height="837"
                              inkscape:window-x="-8"
                              inkscape:window-y="-8"
                              inkscape:window-maximized="1"
                              inkscape:current-layer="g6"
                            />
                            <g
                              id="g6"
                              style="fill: #666666"
                              transform="translate(-2.361,-5.814087)"
                            >
                              <path
                                d="m 59.638,29.983 h -1.956 c -1.104,0 -2,0.896 -2,2 0,1.104 0.896,2 2,2 h 1.956 c 1.104,0 2,-0.896 2,-2 0,-1.104 -0.896,-2 -2,-2 z"
                                fill="#ffffff"
                                data-original="#000000"
                                id="mediumVolumeSymbol"
                                style="fill: #ffffff"
                                sodipodi:nodetypes="sssssss"
                              />
                            </g>
                          </svg>
                        </div>
                        <div class="high-volume-button">
                          <svg
                            version="1.1"
                            width="474.216"
                            height="418.98331"
                            x="0"
                            y="0"
                            viewBox="0 0 59.277 52.372913"
                            xml:space="preserve"
                            class=""
                            id="svg10"
                            sodipodi:docname="volume - Copy (4).svg"
                            inkscape:version="1.2.1 (9c6d41e410, 2022-07-14)"
                            xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                            xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:svg="http://www.w3.org/2000/svg"
                          >
                            <defs id="defs14" />
                            <sodipodi:namedview
                              id="namedview12"
                              pagecolor="#ffffff"
                              bordercolor="#000000"
                              borderopacity="0.25"
                              inkscape:showpageshadow="2"
                              inkscape:pageopacity="0.0"
                              inkscape:pagecheckerboard="0"
                              inkscape:deskcolor="#d1d1d1"
                              showgrid="false"
                              inkscape:zoom="0.4609375"
                              inkscape:cx="238.64407"
                              inkscape:cy="210.44068"
                              inkscape:window-width="1440"
                              inkscape:window-height="837"
                              inkscape:window-x="-8"
                              inkscape:window-y="-8"
                              inkscape:window-maximized="1"
                              inkscape:current-layer="g6"
                            />
                            <g
                              id="g6"
                              style="fill: #666666"
                              transform="translate(-2.361,-5.814087)"
                            >
                              <path
                                d="m 54.082,25.31 c 0.512,0 1.024,-0.195 1.414,-0.586 l 1.389,-1.389 c 0.781,-0.781 0.781,-2.047 0,-2.828 -0.78,-0.781 -2.048,-0.781 -2.828,0 l -1.389,1.389 c -0.781,0.781 -0.781,2.047 0,2.828 0.39,0.39 0.902,0.586 1.414,0.586 z"
                                fill="#ffffff"
                                data-original="#000000"
                                id="highVolumeSymbol"
                                style="fill: #ffffff"
                                sodipodi:nodetypes="scsccsss"
                              />
                            </g>
                          </svg>
                        </div>
                      </div>
                      <div class="volume-cross" id="volumeCross">
                        <svg
                          version="1.1"
                          width="474.216"
                          height="418.983"
                          x="0"
                          y="0"
                          viewBox="0 0 59.277 52.372875"
                          xml:space="preserve"
                          class=""
                          id="svg11"
                          sodipodi:docname="volume-cross.svg"
                          inkscape:version="1.2.1 (9c6d41e410, 2022-07-14)"
                          xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                          xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                          xmlns="http://www.w3.org/2000/svg"
                          xmlns:svg="http://www.w3.org/2000/svg"
                        >
                          <defs id="defs15" />
                          <sodipodi:namedview
                            id="namedview13"
                            pagecolor="#ffffff"
                            bordercolor="#000000"
                            borderopacity="0.25"
                            inkscape:showpageshadow="2"
                            inkscape:pageopacity="0.0"
                            inkscape:pagecheckerboard="0"
                            inkscape:deskcolor="#d1d1d1"
                            showgrid="false"
                            inkscape:zoom="0.921875"
                            inkscape:cx="221.28814"
                            inkscape:cy="252.74576"
                            inkscape:window-width="1440"
                            inkscape:window-height="837"
                            inkscape:window-x="-8"
                            inkscape:window-y="-8"
                            inkscape:window-maximized="1"
                            inkscape:current-layer="svg11"
                            showguides="false"
                          />
                          <g
                            id="g9"
                            style="fill: #ffffff"
                            transform="matrix(0.0432537,0,0,0.0432537,45.410256,19.253064)"
                          >
                            <g id="g7" style="fill: #ffffff">
                              <g id="close_1_" style="fill: #ffffff">
                                <path
                                  d="m 30.391,318.583 c -7.86,0.457 -15.59,-2.156 -21.56,-7.288 -11.774,-11.844 -11.774,-30.973 0,-42.817 L 266.643,10.665 c 12.246,-11.459 31.462,-10.822 42.921,1.424 10.362,11.074 10.966,28.095 1.414,39.875 L 51.647,311.295 c -5.893,5.058 -13.499,7.666 -21.256,7.288 z"
                                  fill="#ffffff"
                                  data-original="#000000"
                                  class=""
                                  id="path2"
                                  style="fill: #ffffff"
                                />
                                <path
                                  d="m 287.9,318.583 c -7.966,-0.034 -15.601,-3.196 -21.257,-8.806 L 8.83,51.963 C -2.078,39.225 -0.595,20.055 12.143,9.146 c 11.369,-9.736 28.136,-9.736 39.504,0 l 259.331,257.813 c 12.243,11.462 12.876,30.679 1.414,42.922 -0.456,0.487 -0.927,0.958 -1.414,1.414 -6.35,5.522 -14.707,8.161 -23.078,7.288 z"
                                  fill="#ffffff"
                                  data-original="#000000"
                                  class=""
                                  id="path4"
                                  style="fill: #ffffff"
                                />
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                    </div>
                  </div>
                </section>
              </section>


   
   <script>
      "use strict";
          let audioTrack = document.createElement("audio");
          audioTrack.preload = "metadata";
          document.body.append(audioTrack);

          let blurElement = document.getElementById("blurElement");

          let themes = document.getElementById("themes");

          let musicBox = document.getElementById("musicBox");

          let trackItemsWrapper = document.getElementById("trackItemsWrapper");

          let trackArtistName = document.getElementById("trackArtistName");
          let trackAlbumName = document.getElementById("trackAlbumName");

          let coverImage = document.getElementById("coverImage");

          let playButton = document.getElementById("playButton");
          let playButtonIcon = playButton.firstElementChild;
          let pauseButtonIcon = playButton.lastElementChild;

          let previousButton = document.getElementById("previousButton");
          let nextButton = document.getElementById("nextButton");

          let volumeWrapper = document.getElementById("volumeWrapper");
          let volumeButton = document.getElementById("volumeButton");
          let volumeNumber = document.getElementById("volumeNumber");

          let wavesVolumeButton = document.getElementById("wavesVolumeButton");
          let highVolumeSymbol = document.getElementById("highVolumeSymbol");
          let mediumVolumeSymbol = document.getElementById("mediumVolumeSymbol");
          let lowVolumeSymbol = document.getElementById("lowVolumeSymbol");
          let volumeCross = document.getElementById("volumeCross");

          let currentTrackTimeNumber = document.getElementById(
            "currentTrackTimeNumber"
          );
          let currentTrackDuration = document.getElementById("currentTrackDuration");

          let trackProgressBar = document.getElementById("trackProgressBar");
          let trackLoading = document.getElementById("trackLoading");
          let currentTrackTimeBar = document.getElementById("currentTrackTimeBar");

          let musics = [
            {
              trackName: 'AUDIO NAME   <?php echo $row->songName; ?> ', // NAME OF THE MUSIC  
              coverImage: "https://cdn.dribbble.com/users/2407143/screenshots/10727861/letter_sound_wave_3d_logo3.png", // COVER IMAGE OF THE SONG
              audioSource:'<?php echo $file_url ?>', // file of the song
            },
          ];

          musics.forEach((item, index) => {
            trackItemsWrapper.innerHTML += `<div class="track-item" data-index="${index}">${index+1}.${item.trackName}</div>`;
          });

          trackItemsWrapper.firstElementChild.classList.add("active");

          function informationUpdate(target) {
            target = target ? target : 0;
            coverImage.src = "";
            coverImage.src = musics[target].coverImage;
            audioTrack.src = musics[target].audioSource;
            trackArtistName.textContent = musics[target].artist;
            trackAlbumName.textContent = musics[target].album;
          }

          informationUpdate();

          themes.addEventListener("click", (e) => {
            if (e.target == e.currentTarget) return;
            let targetTheme = e.target.dataset.theme;

            let activeTheme = document.querySelector(".active-theme");
            activeTheme.classList.remove("active-theme");

            e.target.classList.add("active-theme");

            switch (targetTheme) {
              case "theme1":
                blurElement.style.visibility = "hidden";
                musicBox.style.border = "";
                musicBox.style.boxShadow = "";
                coverImage.style.background = "";
                trackProgressBar.style.background = "";
                currentTrackTimeBar.style.background = "";
                trackLoading.style.background = "";
                break;
            }
          });

          trackItemsWrapper.addEventListener("click", (e) => {
            if (e.target == e.currentTarget) return;
            let activeAudio = document.querySelector(".active");
            activeAudio.classList.remove("active");
            e.target.classList.add("active");

            let targetIndex = e.target.dataset.index;

            informationUpdate(targetIndex);
          });

          audioTrack.addEventListener("waiting", waitingEvent);

          function waitingEvent() {
            trackLoading.classList.add("track-loading");
          }

          audioTrack.addEventListener("canplay", (e) => {
            trackLoading.classList.remove("track-loading");
            audioTrack.removeEventListener("waiting", waitingEvent);
          });

          let firstPlay = true;
          audioTrack.addEventListener("loadstart", (e) => {
            audioTrack.addEventListener("waiting", waitingEvent);
            currentTrackTimeBar.style.width = 0;
            if (!firstPlay) {
              audioTrack.play();
            }
            firstPlay = false;
          });

          let requestAnimationTimeArgument = performance.now();

          requestAnimationFrame(function currentTimeUpdater(
            requestAnimationTimeArgument
          ) {
            let currentTime = audioTrack.currentTime;

            let currentMinute = Math.trunc(currentTime / 60);
            let currentSeconds = Math.trunc(currentTime % 60);

            if (currentSeconds < 10) {
              currentSeconds = "0" + currentSeconds;
            }

            currentTrackTimeNumber.textContent = `${currentMinute}:${currentSeconds}`;

            currentTrackTimeBar.style.width =
              (currentTime / audioTrack.duration) * 100 + "%";

            requestAnimationFrame(currentTimeUpdater);
          });

          audioTrack.addEventListener("canplay", canPlayEvent);

          audioTrack.addEventListener("durationchange", canPlayEvent);

          function canPlayEvent(e) {
            let totalTime = audioTrack.duration;

            let totalMinute = Math.trunc(totalTime / 60);
            let totalSeconds = Math.trunc(totalTime % 60);

            if (totalSeconds < 10) {
              totalSeconds = "0" + totalSeconds;
            }

            currentTrackDuration.textContent = `${totalMinute}:${totalSeconds}`;
          }

          trackProgressBar.addEventListener("pointerdown", (e) => {
            audioTrack.currentTime =
              ((e.offsetX / trackProgressBar.offsetWidth) *
                100 *
                audioTrack.duration) /
              100;
            trackProgressBar.addEventListener(
              "pointermove",
              trackProgressBarPointerMove
            );
            function trackProgressBarPointerMove(e) {
              audioTrack.currentTime =
                ((e.offsetX / trackProgressBar.offsetWidth) *
                  100 *
                  audioTrack.duration) /
                100;
            }
            document.addEventListener("pointerup", (e) => {
              trackProgressBar.removeEventListener(
                "pointermove",
                trackProgressBarPointerMove
              );
            });
          });

          trackProgressBar.addEventListener("wheel", (e) => {
            if (e.deltaY < 0) {
              audioTrack.currentTime += 5;
            }
            if (e.deltaY > 0) {
              audioTrack.currentTime -= 5;
            }
          });

          playButton.addEventListener("click", (e) => {
            if (audioTrack.paused) {
              audioTrack.play();
            } else {
              audioTrack.pause();
            }
          });

          previousButton.addEventListener("click", (e) => {
            let activeAudio = document.querySelector(".active");

            let trackItems = document.querySelectorAll(".track-item");

            let activeIndex =
              +activeAudio.dataset.index == 0
                ? trackItems.length
                : +activeAudio.dataset.index;

            let targetIndex = +activeIndex - 1;

            activeAudio.classList.remove("active");
            trackItems[targetIndex].classList.add("active");

            informationUpdate(targetIndex);
          });

          nextButton.addEventListener("click", (e) => {
            let activeAudio = document.querySelector(".active");

            let trackItems = document.querySelectorAll(".track-item");

            let activeIndex =
              +activeAudio.dataset.index == trackItems.length - 1
                ? -1
                : +activeAudio.dataset.index;

            let targetIndex = +activeIndex + 1;

            activeAudio.classList.remove("active");
            trackItems[targetIndex].classList.add("active");

            informationUpdate(targetIndex);
          });

          audioTrack.addEventListener("play", (e) => {
            playButtonIcon.style.opacity = 0;
            pauseButtonIcon.style.opacity = 1;
            if (wasPlaying) {
              wasPlaying = false;
            }
          });

          // prevent from nested animations
          let firstTimeAnimation = true;
          audioTrack.addEventListener("playing", (e) => {
            if (firstTimeAnimation) {
              blurElement.animate(
                { filter: "blur(30px)" },
                {
                  duration: 5000,
                  easing: "ease-in-out",
                  direction: "alternate",
                  iterations: Infinity,
                }
              );
              firstTimeAnimation = false;
            }
          });

          audioTrack.addEventListener("pause", (e) => {
            playButtonIcon.style.opacity = 1;
            pauseButtonIcon.style.opacity = 0;

            blurElement.animate(
              { filter: "blur(10px)" },
              {
                duration: 1000,
                easing: "linear",
                fill: "forwards",
              }
            );

            firstTimeAnimation = true;
          });

          volumeWrapper.addEventListener(
            "wheel",
            (e) => {
              e.preventDefault();
              switch (true) {
                case e.deltaY < 0:
                  audioTrack.volume = (audioTrack.volume += 0.05).toFixed(2);
                  break;

                case e.deltaY > 0:
                  audioTrack.volume = (audioTrack.volume -= 0.05).toFixed(2);
                  break;
              }
              volumeNumberUpdate();
            },
            { passive: false }
          );

          function volumeNumberUpdate() {
            // trunc is just for (0.55 * 100)!
            volumeNumber.textContent = Math.trunc(audioTrack.volume * 100);
          }

          let wasPlaying;
          audioTrack.addEventListener("volumechange", (e) => {
            let currentVolume = audioTrack.volume;
            switch (true) {
              case 0.66 < currentVolume:
                highVolumeSymbol.style.fill = "white";
                mediumVolumeSymbol.style.fill = "white";
                lowVolumeSymbol.style.fill = "white";
                wavesVolumeButton.style.opacity = 1;
                volumeCross.style.opacity = 0;
                if (wasPlaying) {
                  audioTrack.play();
                  wasPlaying = false;
                }
                break;

              case 0.33 < currentVolume && currentVolume < 0.66:
                highVolumeSymbol.style.fill = "#808080";
                mediumVolumeSymbol.style.fill = "white";
                lowVolumeSymbol.style.fill = "white";
                wavesVolumeButton.style.opacity = 1;
                volumeCross.style.opacity = 0;
                if (wasPlaying) {
                  audioTrack.play();
                  wasPlaying = false;
                }
                break;

              case 0 < currentVolume && currentVolume < 0.33:
                highVolumeSymbol.style.fill = "#808080";
                mediumVolumeSymbol.style.fill = "#808080";
                lowVolumeSymbol.style.fill = "white";
                wavesVolumeButton.style.opacity = 1;
                volumeCross.style.opacity = 0;
                if (wasPlaying) {
                  audioTrack.play();
                  wasPlaying = false;
                }
                break;

              case currentVolume == 0:
                wavesVolumeButton.style.opacity = 0;
                volumeCross.style.opacity = 1;
                if (!audioTrack.paused) {
                  wasPlaying = true;
                  audioTrack.pause();
                }
                break;
            }

            volumeNumberUpdate();
          });

          document.addEventListener("keydown", (e) => {
            switch (e.code) {
              case "ArrowDown":
                audioTrack.volume = (audioTrack.volume -= 0.05).toFixed(2);
                break;

              case "ArrowUp":
                audioTrack.volume = (audioTrack.volume += 0.05).toFixed(2);
                break;

              case "ArrowLeft":
                audioTrack.currentTime -= 5;
                break;

              case "ArrowRight":
                audioTrack.currentTime += 5;
                break;

              case "Space":
                if (audioTrack.paused) {
                  audioTrack.play();
                } else {
                  audioTrack.pause();
                }
                break;
            }

            if (e.code == "ArrowDown" || e.code == "ArrowUp") {
              volumeButton.style.opacity = 0;
              volumeNumber.style.opacity = 1;

              document.addEventListener("keyup", (e) => {
                let volumeChangeAnimation = setTimeout(() => {
                  volumeButton.style.opacity = 1;
                  volumeNumber.style.opacity = 0;
                }, 600);

                document.addEventListener("keydown", (e) => {
                  if (e.code == "ArrowDown" || e.code == "ArrowUp") {
                    clearTimeout(volumeChangeAnimation);
                  }
                });
              });
            }
          });

          coverImage.addEventListener("pointerdown", (e) => {
            e.preventDefault();
            let coverImageBigSize = coverImage.cloneNode();
            coverImageBigSize.className = "cover-image-big-size";
            coverImageBigSize.removeAttribute("id");
            document.body.append(coverImageBigSize);

            document.addEventListener("pointerup", (e) => {
              coverImageBigSize.remove();
            });
          });
    </script>
 
</body>

    <?php 
      }
        else{
          echo  " <h1 style= 'color: white'> Name Does not exist </h1>";
        } 
  } 
