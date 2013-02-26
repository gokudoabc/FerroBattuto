	<div id="footer">
        <div class="navfoot">                                
            <ul> 
                <li><a href="http://www.ferrobattuto.com.br"><strong>Home</strong></a></li> 
                <li><a href="http://www.ferrobattuto.com.br/a-empresa/"><strong>A Empresa</strong></a></li> 
                <li><a href="http://www.ferrobattuto.com.br/produtos/"><strong>Produtos</strong></a></li> 
                <li><a href="http://www.ferrobattuto.com.br/servicos/"><strong>Serviços</strong></a></li> 
                <li><a href="http://www.ferrobattuto.com.br/contato/"><strong>Contato</strong></a></li> 
                <li><a href="#"><strong>   <?php $sqlnoticia = $mySQL->runQuery("SELECT * FROM fer_artigo WHERE idartigo='34'");
            $rsnoticia = mysql_fetch_array($sqlnoticia);  echo $rsnoticia['artigo'];?></strong></a> </li>
            </ul>
            <a href="http://www.bymullets.com.br" rel="external" id="dev">Website By Mullets</a>  
        </div>
    <br></br>
    </div> 
    <script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
    try {
    var pageTracker = _gat._getTracker("UA-8427107-9");
    pageTracker._trackPageview();
    } catch(err) {}
    </script>
</body> 
</html> 