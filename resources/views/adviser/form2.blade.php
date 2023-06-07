<!-- CSS Code: Place tdis code in tde document's head (between tde 'head' tags) -->
<link rel="stylesheet" href="{{ asset('css/form2.css') }}">
    
    <!-- HTML Code: Place tdis code in tde document's body (between tde 'body' tags) where tde table should appear -->
    <table class="GeneratedTable">
      <tbody>
        <tr class="form2subheader noBorderheader"> 
          <td colspan="14" > <div style="position: relative;"><img style="position: absolute; z-index: 1; left: 0px; top: 4px; width: 129px; height: 129px;" src="{{url('images/depedLogo.png')}}" border="0" /></div> </td>
          <td colspan="21" style="font-size: 22pt"> </td>
          <td colspan="2" style="height: 30px;"></td>
          <td colspan="12">  <div style="position: relative;"><img style="position: absolute; z-index: 1; left: 48px; top: 5px; width: 285px; height: 132px;" src="{{url('images/depedLogo2.png')}}" border="0" /></div></td>
        </tr>
        <tr class="form2header noBorderheader"> 
          <td colspan="14" ></td>
          <td colspan="21" style="font-size: 22pt"> School Form 2 (SF2) Daily Attendance Report of Learners </td>
          <td colspan="2"></td>
          <td colspan="12"></td> 
        </tr>
        <tr class="form2subheader noBorder"> 
          <td colspan="49"> (This replaced Form 1, Form 2 & STS Form 4 - Absenteeism and Dropout Profile) </td>
        </tr>
        <tr class="form2subheader noBorderTLR"> 
          <td colspan="49" style="height: 50px;"></td>
        </tr>
        <tr style="height:50px;" class="noBorder">
          <td colspan="8" class="right"> School ID</td>
          <td colspan="4" class="headerB21"> </td>
          <td colspan="5" class="right left"> School Year</td>
          <td colspan="5" class="headerB21">  </td>
          <td colspan="8" class="right left"> Report for the Month of</td>
          <td colspan="7" class="headerB21">  </td>
          <td colspan="12" class="left"></td>
        </tr>
        <tr class="headergap noBorder">
          <td colspan="8" class="right"></td>
          <td colspan="4" class="top"> </td>
          <td colspan="5" class="right"></td>
          <td colspan="5" class="top"></td>
          <td colspan="8" class="right"></td>
          <td colspan="7" class="top"></td>
          <td colspan="12" class="left"></td>
        </tr>
        <tr class="headergap noBorder">
          <td colspan="8"></td>
          <td colspan="14" class="bottom"></td>
          <td colspan="8" class="right"></td>
          <td colspan="2" class="bottom"></td>
          <td colspan="3" class="right"></td>
          <td colspan="10" class="bottom"></td>
          <td colspan="4" class="border"></td>
        </tr>
        <tr style="height:50px;" class="noBorder">
          <td colspan="8" class="right"> Name of School</td>
          <td colspan="14" class="headerB21">  </td>
          <td colspan="8" class="right adviserleft"> Grade Level</td>
          <td colspan="2" class="headerB21">{{ $grade_level}}</td>
          <td colspan="3" class="right left"> Section</td>
          <td colspan="10" class="headerB21">  </td>
          <td colspan="4" class="left"></td>
        <tr class=" noBorder">
          <td colspan="8" class="right"></td>
          <td colspan="14" class="top"></td>
          <td colspan="8" class="right"></td>
          <td colspan="2" class="top"></td>
          <td colspan="3" class="right"></td>
          <td colspan="10" class="top"></td>
          <td colspan="4" class="border"></td>
        </tr>
        <tr class=" noBorder">
          <td class="borderB" colspan="29"></td>
        </tr>
        </tr>
        <tr>
          <td class="outerside header" colspan="10" rowspan="3">LEARNER'S NAME <br>(Last Name, First Name, Middle Name) </td>
          <td class="header" colspan = "25">  (1st row for date, 2nd row for Day: M,T,W,TH,F) </td>
          <td class="header" colspan = "6" rowspan="2"> Total for the Month </td>
          <td class="headersub" colspan = "8" rowspan = "3">  <b>REMARK/S</b> (If <b>DROPPED OUT,</b> state reason, please refer to legend number 2. If <b>TRANSFERRED IN/OUT</b>, write the name of School.) </td>
        </tr>
        <tr>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="borderL num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="borderL num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="borderL num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="borderL num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
          <td class="num"> </td>
        </tr>
        <tr> <!--third row, for dates sa attendance-->
          <td class="borderB num1"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderL borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderL borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderL borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderL borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="headersub" colspan = "3"> ABSENT </td>
          <td class="headersub" colspan = "3"> TARDY </td>
        </tr>
        <tr> <!--sample row 1-->
          <td class="borderL num2" > </td>
          <td colspan="9"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL" colspan="3"> </td>
          <td class="borderL" colspan="3"> </td>
          <td class="borderLR" colspan="8"> </td>
        </tr>
        <tr> <!--sample row 2-->
          <td class="borderL num2" > </td>
          <td colspan="9"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL" colspan="3"> </td>
          <td class="borderL" colspan="3"> </td>
          <td class="borderLR" colspan="8"> </td>
        </tr>
        <tr> <!--total male per day row-->
          <td class="borderLRB num2" colspan="10"> MALE | TOTAL per day </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB "> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB "> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB "> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB" colspan="3"> </td>
          <td class="borderLB" colspan="3"> </td>
          <td class="borderLRB" colspan="8"> </td>
        </tr>
        <tr> <!--sample row 1-->
          <td class="borderL num2" > </td>
          <td colspan="9"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL" colspan="3"> </td>
          <td class="borderL" colspan="3"> </td>
          <td class="borderLR" colspan="8"> </td>
        </tr>
        <tr> <!--sample row 2-->
          <td class="borderL num2" > </td>
          <td colspan="9"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="crossed"> </td>
          <td class="borderL" colspan="3"> </td>
          <td class="borderL" colspan="3"> </td>
          <td class="borderLR" colspan="8"> </td>
        </tr>
        <tr> <!--total female per day row-->
          <td class="borderLRB num2" colspan="10"> FEMALE | TOTAL per day </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB "> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB "> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB "> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB" colspan="3"> </td>
          <td class="borderLB" colspan="3"> </td>
          <td class="borderLRB" colspan="8"> </td>
        </tr>
        <tr> <!--combined total per day row-->
          <td class="borderLRB num2" colspan="10"> Combined TOTAL PER DAY </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB "> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB "> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB "> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderB"> </td>
          <td class="borderLB" colspan="3"> </td>
          <td class="borderLB" colspan="3"> </td>
          <td class="borderLRB" colspan="8"> </td>
        </tr>
        <tr class="noBorder"> <!--holder row para di maguba ang formatting-->
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB23"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>
          <td style="height: 10px;" class="headerB22"> </td>

        </tr> 
        <tr class="noBorder"> 
          <td style="height: 60px;" colspan="23" class="headerB2"> <b>GUIDELINES:</b> </td>
          <td style="height: 40px;" colspan="10" class="headerB"> <b>1. CODES FOR CHECKING ATTENDANCE</b> </td>
          <td class="headerB3"> </td>
          <td colspan="7" rowspan="2" class="headerB"> <b>Month:</b> </td>
          <td colspan="3" rowspan="2" class="headerB12"> <b>No. of Days of Classes: </b> </td>
          <td colspan="2" rowspan="2" class="headerB11"> <b> </b> </td>
          <td colspan="3" class="headerB7"> <b><center>Summary for the Month</center></b></td>
        </tr>
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="23" class="headerB2"> 1. The attendance shall be accomplished daily. Refer to the codes for checking learners' attendance. </td>
          <td style="height: 20px;" colspan="10" rowspan="3" class="headerB4"> <b>blank</b>- Present;   (x)- Absent; Tardy (half shaded= Upper for Late Commer, Lower for Cutting Classes) </td>
          <td class="headerB3"> </td>
          <td class="headerB5"> <b><center> M </center></b></td>
          <td class="headerB5"> <b><center> F </center></b></td>
          <td class="headerB6"> <b><center> TOTAL </center></b></td>
        </tr>
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="23" class="headerB2"> 2. Dates shall be written in the preceding columns beside Learner's Name. </td>
          <td class="headerB3"> </td>
          <td colspan="12" rowspan="2" class="headerB14"> <i>* Enrolment  as of  (1st Friday of June)</i> </td>
          <td class="headerB8" rowspan="2"> <b> </b></td>
          <td class="headerB10" rowspan="2"> <b>   </b></td>
          <td class="headerB9" rowspan="2"> <b>   </b></td>
        </tr>  
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="23" class="headerB2"> 3. To compute the following: </td>
          <td class="headerB3"> </td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="1" rowspan="2" class="headerB2 right2"> a.</td>
          <td rowspan="2"></td>
          <td style="height: 20px;" colspan="9" rowspan="2" class="headerB2"> <center>Percentage of Enrolment =</center> </td>
          <td style="height: 20px;" colspan="10" class="headerB15"><center>Registered Learner as of End of the Month</center></td>
          <td style="height: 20px;" colspan="2" rowspan="2" class="headerB2">  = 100% </td>
          <td style="height: 20px;" colspan="10" class="headerB4"> <b>2. REASONS/CAUSES OF DROP-OUTS</b> </td>
          <td class="headerB3"> </td>
          <td colspan="12" rowspan="2" class="headerB14"> <i><center>Late Enrollment <b>during the month</b><br>(beyond cut-off)</center></i> </td>
          <td class="headerB8" rowspan="2"> <b> </b></td>
          <td class="headerB13" rowspan="2"> <b>   </b></td>
          <td class="headerB9" rowspan="2"> <b>   </b></td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="10" class="headerB16"><center>Enrolment as of 1st Friday of June</center></td>
          <td style="height: 20px;" colspan="10" class="headerB4"> <b>a. Domestic-Related Factors</b> </td>
          <td class="headerB3"> </td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="1" rowspan="2" class="headerB2 right2"> b.</td>
          <td rowspan="2"></td>
          <td style="height: 20px;" colspan="9" rowspan="2" class="headerB2"> <center>Average Daily Attendance =</center> </td>
          <td style="height: 20px;" colspan="10" class="headerB15"><center>Total Daily Attendance</center></td>
          <td style="height: 20px;" colspan="2" rowspan="2" class="headerB2">  = 100% </td>
          <td style="height: 20px;" colspan="10" class="headerB4"> a.1. Had to take care of siblings </td>
          <td class="headerB3"> </td>
          <td colspan="12" rowspan="2" class="headerB14"> <i><center>Registered Learner as of <b>end of the month</b></center></i> </td>
          <td class="headerB8" rowspan="2"> <b> </b></td>
          <td class="headerB13" rowspan="2"> <b>   </b></td>
          <td class="headerB9" rowspan="2"> <b>   </b></td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="10" class="headerB16"><center>Number of School Days in reporting month</center></td>
          <td style="height: 20px;" colspan="10" class="headerB4"> a.2. Early marriage/pregnancy </td>
          <td class="headerB3"> </td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" rowspan="2" class="headerB2 right2"> c.</td>
          <td rowspan="2"></td>
          <td style="height: 20px;" colspan="9" rowspan="2" class="headerB2"> <center>Percentage of Attendance for the month =</center> </td>
          <td style="height: 20px;" colspan="10" class="headerB15"><center>Average daily attendance</center></td>
          <td style="height: 20px;" colspan="2" rowspan="2" class="headerB2">  = 100% </td>
          <td style="height: 20px;" colspan="10" class="headerB4"> a.3. Parents' attitude toward schooling </td>
          <td class="headerB3"> </td>
          <td colspan="12" rowspan="2" class="headerB14"> <i><center>Percentage of Enrolment as of <b>end of the month</b></center></i> </td>
          <td class="headerB8" rowspan="2"> <b> </b></td>
          <td class="headerB13" rowspan="2"> <b>   </b></td>
          <td class="headerB9" rowspan="2"> <b>   </b></td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="10" class="headerB16"><center>Registered Learner as of End of the month</center></td>
          <td style="height: 20px;" colspan="10" class="headerB4"> a.4. Family problems </td>
          <td class="headerB3"> </td>
        </tr>
        <tr class="noBorder"> 
          <td style="height: 40px;" colspan="23" class="headerB2"> </td>
          <td style="height: 20px;" colspan="10" class="headerB4"> <b>b. Individual-Related Factors</b> </td>
          <td class="headerB3"> </td>
          <td colspan="12" class="headerB14"> <i><center>Average Daily Attendance</center></i> </td>
          <td class="headerB8"> <b> </b></td>
          <td class="headerB13"> <b>   </b></td>
          <td class="headerB9"> <b>   </b></td>
        </tr>
        <tr class="noBorder"> 
          <td style="height: 40px;" colspan="23" rowspan="2" class="headerB2"> 4. Every End of the month, the class adviser will submit this form to the office of the principal for recording of <br>       summary table into the School Form 4. Once signed by the principal, this form should be returned to the adviser.</td>
          <td style="height: 20px;" colspan="10" class="headerB4"> b.1. Illness </td>
          <td class="headerB3"> </td>
          <td colspan="12" rowspan="2" class="headerB14"> <i><center>Percentage of Attendance for the month </center></i> </td>
          <td class="headerB8" rowspan="2"> <b> </b></td>
          <td class="headerB13" rowspan="2"> <b>   </b></td>
          <td class="headerB9" rowspan="2"> <b>   </b></td>
        </tr>    
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="10" class="headerB4"> b.2. Overage </td>
          <td class="headerB3"> </td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 40px;" colspan="23" rowspan="2" class="headerB2"> 5. The adviser will extend neccessary intervention including but not limited to home visitation  to learner/s that committed 5 <br> consecutive days of absences or those with potentials of dropping out</td>
          <td style="height: 20px;" colspan="10" class="headerB4"> b.3. Death </td>
          <td class="headerB3"> </td>
          <td colspan="12" rowspan="2" class="headerB14"> <i><center>Number of students with 5 consecutive days of absences: </center></i> </td>
          <td class="headerB8" rowspan="2"> <b> </b></td>
          <td class="headerB13" rowspan="2"> <b>   </b></td>
          <td class="headerB9" rowspan="2"> <b>   </b></td>
        </tr>    
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="10" class="headerB4"> b.4. Drug Abuse </td>
          <td class="headerB3"> </td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="23" class="headerB2"> 6.  Attendance performance of learner is expected to reflect in Form 137 and Form 138 every grading period</td>
          <td style="height: 20px;" colspan="10" class="headerB4">b.5. Poor academic performance </td>
          <td class="headerB3"> </td>
          <td colspan="12" rowspan="2" class="headerB14"> <b><center>Drop out </center></b> </td>
          <td class="headerB8" rowspan="2"> <b> </b></td>
          <td class="headerB13" rowspan="2"> <b>   </b></td>
          <td class="headerB9" rowspan="2"> <b>   </b></td>
        </tr>    
        <tr class="noBorder">
          <td class="right2"> *</td>
          <td style="height: 20px;" colspan="22" class="headerB2">Beginning of School Year cut-off report is every 1st Friday of School Calendar Days</td> 
          <td style="height: 20px;" colspan="10" class="headerB4"> b.6. Lack of interest/Distractions </td>
          <td class="headerB3"> </td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="23" class="headerB2"></td>
          <td style="height: 20px;" colspan="10" class="headerB4">b.7. Hunger/Malnutrition </td>
          <td class="headerB3"> </td>
          <td colspan="12" rowspan="2" class="headerB14"> <b><center>Transferred Out</center></b> </td>
          <td class="headerB8" rowspan="2"> <b> </b></td>
          <td class="headerB13" rowspan="2"> <b>   </b></td>
          <td class="headerB9" rowspan="2"> <b>   </b></td>
        </tr>    
        <tr class="noBorder">
          <td style="height: 20px;" colspan="23" class="headerB2"></td> 
          <td style="height: 20px;" colspan="10" class="headerB4"> <b>c. School-Related Factors</b> </td>
          <td class="headerB3"> </td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="23" class="headerB2"></td>
          <td style="height: 20px;" colspan="10" class="headerB4">c.1. Teacher Factor</td>
          <td class="headerB3"> </td>
          <td colspan="12" rowspan="2" class="headerB17"> <b><center>Transferred in</center></b> </td>
          <td class="headerB8" rowspan="2"> <b> </b></td>
          <td class="headerB13" rowspan="2"> <b>   </b></td>
          <td class="headerB9" rowspan="2"> <b>   </b></td>
        </tr>    
        <tr class="noBorder">
          <td style="height: 20px;" colspan="23" class="headerB2"></td> 
          <td style="height: 20px;" colspan="10" class="headerB4"> c.2. Physical condition of classroom </td>
          <td class="headerB3"> </td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="23" class="headerB2"></td>
          <td style="height: 20px;" colspan="10" class="headerB4">c.3. Peer influence</td>
          <td class="headerB3"> </td>
          <td style="height: 20px;" colspan="16" class="headerB18"></td> 
        </tr>    
        <tr class="noBorder">
          <td style="height: 20px;" colspan="23" class="headerB2"></td> 
          <td style="height: 20px;" colspan="10" class="headerB4"> <b>d. Geographic/Environmental</b> </td>
          <td class="headerB3"> </td>
          <td style="height: 20px;" colspan="16"> <i>I certify that this is a true and correct report.</i> </td> 
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="23" class="headerB2"></td>
          <td style="height: 20px;" colspan="10" class="headerB4">d.1. Distance between home and school</td>
          <td class="headerB3"> </td>
          <td style="height: 20px;" colspan="4"></td> 
          <td style="height: 20px;" colspan="10" class="underline">   </td> 
          <td style="height: 20px;" colspan="2"></td>
        </tr>    
        <tr class="noBorder">
          <td style="height: 20px;" colspan="23" class="headerB2"></td> 
          <td style="height: 20px;" colspan="10" rowspan="2" class="headerB4"> d.2. Armed conflict (incl. Tribal wars & clanfeuds) </td>
          <td class="headerB3"> </td>
          <td style="height: 20px;" colspan="4"></td> 
          <td style="height: 20px;" colspan="10" class="underlineT"> <i><center>(Signature of Teacher over Printed Name)</center></i></td> 
          <td style="height: 20px;" colspan="2"></td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="23" class="headerB2"></td>
          <td class="headerB3"> </td>
          <td style="height: 20px;" colspan="4">Attested by:</td> 
          <td style="height: 20px;" colspan="10" ></td> 
          <td style="height: 20px;" colspan="2"></td>
        </tr>    
        <tr class="noBorder">
          <td style="height: 20px;" colspan="23" class="headerB2"></td> 
          <td style="height: 20px;" colspan="10" class="headerB4">d.3. Calamities/Disasters</td>
          <td class="headerB3"> </td>
          <td style="height: 20px;" colspan="4"></td> 
          <td style="height: 20px;" colspan="10" class="underline"></td> 
          <td style="height: 20px;" colspan="2"></td>
        </tr> 
        <tr class="noBorder"> 
          <td style="height: 20px;" colspan="23" class="headerB2"></td>
          <td style="height: 20px;" colspan="10" class="headerB4"><b>e. Financial-Related</b></td>
          <td class="headerB3"> </td>
          <td style="height: 20px;" colspan="4"></td> 
          <td style="height: 20px;" colspan="10" class="underlineT"> <i><center> (Signature of School Head over Printed Name)</center></i></td> 
          <td style="height: 20px;" colspan="2"></td>
        </tr>  
        <tr class="noBorder">
          <td style="height: 20px;" colspan="23" class="headerB2"></td> 
          <td style="height: 20px;" colspan="10" class="headerB4">e.1. Child labor, work</td>
          <td class="headerB3"> </td>
          <td style="height: 20px;" colspan="4"></td> 
          <td style="height: 20px;" colspan="10"></td> 
          <td style="height: 20px;" colspan="2"></td>
        </tr> 
        <tr class="noBorder">
          <td style="height: 20px;" colspan="23" class="headerB2"></td> 
          <td style="height: 20px;" colspan="10" class="headerB20"><b>f. Others</b></td>
          <td class="headerB3"> </td>
          <td style="height: 20px;" colspan="4"></td> 
          <td style="height: 20px;" colspan="10"></td> 
          <td style="height: 20px;" colspan="2"></td>
        </tr>  
      </tbody>
    </table>
    <!-- Codes by Quackit.com -->
    
    