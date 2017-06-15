<!DOCTYPE html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Expenses Per Source</title>
        <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
        <?PHP require_once '/apps/softwaretracker/scripts/tablebyfundingsource.php';
        require_once '/apps/softwaretracker/scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/sumfunding.php';?>
        <script type="text/javascript" src="js/downloadreport.js"></script>
    <body>
        <?PHP navbar();?>
        <?PHP require_once '/apps/softwaretracker/scripts/expensebar.php';?>
        
        <h1 id="top">Expenses Per Funding Source</h1>
        <p>The tables below summarize the licenses budgeted to the <a href="#operation">Operation</a>, <a href="#tech">Technology</a>, <a href="#its">ITS</a>, <a href="#CTE">CTE</a>, <a href="#open">Open Source</a>, and <a href="#unsorted">Unsorted</a> budgets.</p>
            
        <h2 id="operation">Library Operations Budget</h2>
        <?PHP tableByFundingSource('Operations');?>
        <p>Total Cost: <?PHP sumFunding('Operations');?></p>
        <br>
        <button onclick="downloadFundingSourceReport('Operations')">Download</button>
        <button onclick="location.href='/softwaretracker/printerfriendly.php?report=funding_source&area=Operations'">Print</button>
        <a class='panel-button' href="#top">Top</a>
        
        <h2 id="tech">Library Technology Budget</h2>       
        <?PHP tableByFundingSource('Technology');?>
        <p>Total Cost: <?PHP sumFunding('Technology');?></p>
        <br>
        <button onclick="downloadFundingSourceReport('Technology')">Download</button>
        <button onclick="location.href='/softwaretracker/printerfriendly.php?report=funding_source&area=Technology'">Print</button>
        <a class='panel-button' href="#top">Top</a>
        
        <h2 id="its">ITS Budget</h2>
        <?PHP tableByFundingSource('ITS');?>
        <p>Total Cost: <?PHP sumFunding('ITS');?></p>
        <br>
        <button onclick="downloadFundingSourceReport('ITS')">Download</button>
        <button onclick="location.href='/softwaretracker/printerfriendly.php?report=funding_source&area=ITS'">Print</button>
        <a class='panel-button' href="#top">Top</a>
        
        <h2 id="cte">CTE Budget</h2>
        <?PHP tableByFundingSource('CTE');?>
        <p>Total Cost: <?PHP sumFunding('CTE');?></p>
        <br>
        <button onclick="downloadFundingSourceReport('CTE')">Download</button>
        <button onclick="location.href='/softwaretracker/printerfriendly.php?report=funding_source&area=CTE'">Print</button>
        <a class='panel-button' href="#top">Top</a>
        
        <h2 id="open">Open Source</h2>
        <p>These entries are available through non-commercial licensing and do not require a budget source.</p>
        <?PHP tableByFundingSource('OpenSource');?>
        <p>Total Cost: <?PHP sumFunding('OpenSource');?></p>
        <br>
        <button onclick="downloadFundingSourceReport('OpenSource')">Download</button>
        <button onclick="location.href='/softwaretracker/printerfriendly.php?report=funding_source&area=OpenSource'">Print</button>
        <a class='panel-button' href="#top">Top</a>
        
        <h2 id="unsorted">Unsorted Expenses</h2>
        <p>These entries have not been assigned to a funding source.</p>
        <?PHP tableByFundingSource('Unsorted');?>
        <p>Total Cost: <?PHP sumFunding('Unsorted');?></p>
        <br>
        <button onclick="downloadFundingSourceReport('Unsorted')">Download</button>
        <button onclick="location.href='/softwaretracker/printerfriendly.php?report=funding_source&area=Unsorted'">Print</button>
        <a class='panel-button' href="#top">Top</a>
    </body>
    <script src="js/sorttable.js" type="text/javascript"></script>
</html>
