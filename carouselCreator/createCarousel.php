


<style>
.slider-item{
    box-sizing: border-box;
    background:#fafafa;
    border:solid 1px #ddd;
    margin:20px 0;
    padding:15px 15px;
    box-sizing:border-box;
}

.slider-item textarea{
    width:100%;
    height:200px;
    margin: 0;
    padding: 0;
}

.slider-item h4{
    font-size: 15px;
font-weight: bold;
}

.savebtn{
    background: #000;
    color:#fff;
    border:none;
    padding:10px 15px;
    margin-top: 10px;
    width:100%;
    box-sizing: border-box;
}

.moneyshot{
  width: 100%;
  border:solid 1px #ddd;
  padding:10px;
  display:grid;
  grid-template-columns: 1fr 100px;
  margin-top:20px;
  background:#fafafa;
  box-sizing: border-box;
}

.inputer{
width:80%;
padding:10px;
margin-bottom:10px;
display:inline-block;

box-sizing:border-box;
}

.buttonfoto{

  width:19%;
  background:#000;
  display:inline-block;
padding:10px;
box-sizing:border-box;
  color:#fff;
  border:none;
  border:solid 1px #000;
}

.slider-item h4{
margin:10px 0;
}

.slider-item{
position:relative;  
}

.slider-item .formerclose{
  position:absolute;
  top:10px;
  right:10px;
  background:red;
  color:#fff;
  display:flex;
  align-items: center;
  justify-content: center;
  width:30px;
  height:30px;
  border-radius:50%;
  border:none;
  transform: scale(0.8);
}

.close.icon {
  color: #fff;
  position: absolute;
  margin-top: 0;
  margin-left: 0;
  width: 21px;
  height: 21px;
  margin-left:-20px;
}

.close.icon:before {
  content: '';
  position: absolute;
  top: 10px;
  width: 21px;
  height: 1px;
  background-color: currentColor;
  -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
}

.close.icon:after {
  content: '';
  position: absolute;
  top: 10px;
  width: 21px;
  height: 1px;
  background-color: currentColor;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
}


.addSlider{
background:#000;
color:#fff;
padding:10px 15px;
border:none;
height:auto;
transition: all 250ms linear;
}
.carouselConfig{
  font-size:0.9rem;
  color:#fff !important;
  background:red;
  border:solid 4px red;
  padding:5px;
}


.addSlider:hover{
  cursor: pointer;
  background: #222;
}

.buttonfoto{
  cursor: pointer;
}

.formerclose{
  cursor: pointer;
}

.slider-item{
  border-bottom:solid #333 5px;
}

</style>


<?php 
function giveMe(){
  $filecontent = @file_get_contents(GSDATAOTHERPATH. '/createCarousel/sliders.json');

  $resultMe = json_decode($filecontent);

if(isset($resultMe)){
  foreach($resultMe as $res){
  

    echo'<div class="slider-item"><h4>'.i18n_r("carouselCreator/SLIDERITEM").'</h4>';
    echo'<button class="formerclose"><div class="close icon"></div></button>';
    echo' <input type="text" name="text[]" value="'.$res->name.'" class="inputer"> <button class="buttonfoto">'.i18n_r('carouselCreator/CHOOSEFILE').'</button>';
    echo' <textarea  class="sliderContent" name="content[]">'.$res->content.'</textarea></div>';

  };
}


};

;?>





<div style="width:100%;padding:10px;box-sizing:border-box;background:#fafafa;border:solid 1px #ddd;margin-bottom:15px;">
<p style="margin:0;padding:0;">
<h3 style="margin-bottom:5px;"><?php echo i18n_r('carouselCreator/CAROUSELCREATOR');?></h3>
<p style="margin:0;"><?php echo i18n_r('carouselCreator/INFO');?> </p></div>

<button class="addSlider"><?php echo i18n_r('carouselCreator/ADDSLIDER');?> </button>
<a class="carouselConfig" style='text-decoration:none;color:#fff;font-weight:300;font-family: "Lato", sans-serif;
font-size: 0.9rem;' href="<?php global $SITEURL; echo $SITEURL;?>admin/load.php?id=carouselCreator&carouselsettings"><?php echo i18n_r('carouselCreator/TITLE2');?></a>

<form action="#"  method="post">
<div  class="former">

<?php giveMe();?>

</div>
<input type="submit" class="savebtn" name="submit" value="<?php echo i18n_r('carouselCreator/SAVECAROUSEL');?>"/>
</form>


<script>


 

const former = document.querySelector('.former');
let counters = 1;

document.querySelector('.addSlider').addEventListener('click',()=>{



  document.querySelectorAll('.formerclose').forEach(btn=>{
console.log(btn.parentElement);
 btn.addEventListener('click',(e)=>{
e.preventDefault;
btn.parentElement.remove();
            });
            
          })



const inputer= document.createElement('input');
inputer.setAttribute('type','text');
inputer.setAttribute('name','text[]');
inputer.classList.add('inputer');

const textarea= document.createElement('textarea');
textarea.setAttribute('id','sliderContent'+counters);
textarea.setAttribute('name','content[]');

const buttonFoto = document.createElement('button');
buttonFoto.innerHTML = "<?php echo i18n_r('carouselCreator/CHOOSEFILE');?>";
buttonFoto.classList.add('buttonfoto');


const id = textarea.getAttribute('id');
 

const sliderItem = document.createElement('div');
sliderItem.classList.add('slider-item');

const h4= document.createElement('h4');
h4.innerHTML = "<?php echo i18n_r('carouselCreator/SLIDERITEM');?>";

const close = document.createElement('button');
close.innerHTML = '<div class="close icon"></div>';
close.classList.add('formerclose');

sliderItem.appendChild(close);



former.appendChild(sliderItem);
sliderItem.appendChild(h4);
sliderItem.appendChild(inputer);
sliderItem.appendChild(textarea);
inputer.insertAdjacentElement('afterend',buttonFoto);

counters++;

CKEDITOR.replace(id, {
                filebrowserBrowseUrl: 'filebrowser.php?type=all',
                filebrowserImageBrowseUrl: 'filebrowser.php?type=images',
                filebrowserWindowWidth: '730',
                filebrowserWindowHeight: '500'
                , toolbar: 'advanced'
            });



            if(document.querySelector('.buttonfoto')){

const buttonFoto = document.querySelectorAll('.buttonfoto');

buttonFoto.forEach((v,i)=>{
  const baseUrl = "<?php global $SITEURL; echo $SITEURL;?>";

  v.addEventListener('click', (eventr) => {
                eventr.preventDefault();
                const winFile = window.open("upload.php?type=carousel", "myWindow", "tolbar=no,scrollbars=no,menubar=no,width=1280,height=600");

                winFile.onload = () => {
                    winFile.document.querySelector('.floated').style.display = "none";
                    winFile.document.querySelector('.h5').style.display = "none";
                    winFile.document.querySelector('#header').style.display = "none";
                    winFile.document.querySelector('#sidebar').style.display = "none";
                    winFile.document.querySelectorAll('.folder').forEach(folder => folder.style.display = "none");
                    winFile.document.querySelector('#maincontent').style.gridColumn = "1/3";


                    winFile.document.querySelectorAll('.imgthumb').forEach(thumb => {
                        thumb.style.display = "table-cell";
                        thumb.addEventListener('click', (c) => {
                            const thumbLink = thumb.querySelector('a').getAttribute('href');
                            const thumbLinkLength = thumbLink.length;
                            const newLink = baseUrl + thumbLink.substr('3', thumbLinkLength);

                            document.querySelectorAll('.inputer')[i].value = newLink;

                            winFile.close();


                        });

                    });

                    winFile.document.querySelectorAll('.Images').forEach(lor => {

                        const thumb = lor.querySelector('.imgthumb');
                        const link = lor.querySelector('.primarylink');
                        link.setAttribute('href', thumb.querySelector('a').getAttribute('href'));

                        link.addEventListener('click', (e) => {
                            e.preventDefault;
                            const thumbSrc = thumb.querySelector('a').getAttribute('href');
                            const newLink = baseUrl + thumbSrc.substr('3', thumbSrc.length);
                            document.querySelectorAll('.inputer')[i].value = newLink;
                            winFile.close();
                        })
                    });
                };


            });

})

}



          });



document.querySelectorAll('.formerclose').forEach(btn=>{
console.log(btn.parentElement);
 btn.addEventListener('click',(e)=>{
e.preventDefault();
btn.parentElement.remove();
            });
            
          })


</script>


<form action="https://www.paypal.com/cgi-bin/webscr" class="moneyshot" method="post" target="_top" style="display:flex; width:100%;align-items:center;justify-content:space-between;">
        <p style="margin:0;padding:0;"><?php echo i18n_r('carouselCreator/SUPPORT');?> </p>
        <input type="hidden" name="cmd" value="_s-xclick" />
        <input type="hidden" name="hosted_button_id" value="KFZ9MCBUKB7GL" />
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/en_PL/i/scr/pixel.gif" width="1" height="1" />
        </form>



<?php 

global $sliderArray;
 



if (isset($_POST['submit'])){




 $arsen = array();

 if(isset($_POST['text'])){

  $title = $_POST['text'];
  $content = $_POST['content'];
 

foreach ( $content as $key => $value) {


$folder        = GSDATAOTHERPATH . '/createCarousel/';
$filename      = $folder . 'sliders.json';
$chmod_mode    = 0755;
$folder_exists = file_exists($folder) || mkdir($folder, $chmod_mode);
array_push($arsen,array('name'=>$title[$key],'content'=>$content[$key]));
$jser = json_encode($arsen,true);

 if ($folder_exists) {
  file_put_contents($filename, $jser);
}
    };
  }else{

    $folder        = GSDATAOTHERPATH . '/createCarousel/';
$filename      = $folder . 'sliders.json';
$chmod_mode    = 0755;
$folder_exists = file_exists($folder) || mkdir($folder, $chmod_mode);
$jser = '';

 if ($folder_exists) {
  file_put_contents($filename, $jser);
}

  };

echo("<meta http-equiv='refresh' content='0'>");
};

;?>


<script>

document.querySelectorAll('.sliderContent').forEach(c=>{

  CKEDITOR.replace(c, {
      filebrowserBrowseUrl: "filebrowser.php?type=all",
      filebrowserImageBrowseUrl: "filebrowser.php?type=images",
      filebrowserWindowWidth: "730",
      filebrowserWindowHeight: "500"
      , toolbar: "advanced"
  }); 


});

 

if(document.querySelector('.buttonfoto')){

const buttonFoto = document.querySelectorAll('.buttonfoto');

buttonFoto.forEach((v,i)=>{
  const baseUrl = "<?php global $SITEURL; echo $SITEURL;?>";

  v.addEventListener('click', (eventr) => {
                eventr.preventDefault();
                const winFile = window.open("upload.php?type=carousel", "myWindow", "tolbar=no,scrollbars=no,menubar=no,width=1280,height=600");

                winFile.onload = () => {
                    winFile.document.querySelector('.floated').style.display = "none";
                    winFile.document.querySelector('.h5').style.display = "none";
                    winFile.document.querySelector('#header').style.display = "none";
                    winFile.document.querySelector('#sidebar').style.display = "none";
                    winFile.document.querySelectorAll('.folder').forEach(folder => folder.style.display = "none");
                    winFile.document.querySelector('#maincontent').style.gridColumn = "1/3";



                    winFile.document.querySelectorAll('.imgthumb').forEach(thumb => {
                        thumb.style.display = "table-cell";
                        thumb.addEventListener('click', (c) => {
                            const thumbLink = thumb.querySelector('a').getAttribute('href');
                            const thumbLinkLength = thumbLink.length;
                            const newLink = baseUrl + thumbLink.substr('3', thumbLinkLength);

                            document.querySelectorAll('.inputer')[i].value = newLink;

                            winFile.close();


                        });

                    });

                    winFile.document.querySelectorAll('.Images').forEach(lor => {

                        const thumb = lor.querySelector('.imgthumb');
                        const link = lor.querySelector('.primarylink');
                        link.setAttribute('href', thumb.querySelector('a').getAttribute('href'));

                        link.addEventListener('click', (e) => {
                            e.preventDefault;
                            const thumbSrc = thumb.querySelector('a').getAttribute('href');
                            const newLink = baseUrl + thumbSrc.substr('3', thumbSrc.length);
                            document.querySelectorAll('.inputer')[i].value = newLink;
                            winFile.close();
                        })
                    });
                };


            });

})

};





  </script>