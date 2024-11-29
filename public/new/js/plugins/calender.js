function createCalander(seanceId,callback){
    

var datepicker =  document.querySelectorAll("#calender-active");

if(datepicker.length){
    
    document.querySelectorAll('.dateChanger').forEach(elem=>{
        elem.addEventListener('change',e=>{
            jump()


        })



    })
    function generate_year_range(start, end) {
        var years = "";
        for (var year = start; year <= end; year++) {
            years += "<option value='" + year + "'>" + year + "</option>";
        }
        return years;
    }
    
    selectedDay = new Date();
    callback(seanceId,selectedDay.toISOString().split('T')[0])
    currentMonth = selectedDay.getMonth();
    currentYear = selectedDay.getFullYear();
    selectYear = document.getElementById("year");
    selectMonth = document.getElementById("month");
    
    
    createYear = generate_year_range((new Date()).getFullYear(), 2050);
    /** or
     * createYear = generate_year_range( 1970, currentYear );
     */
    
    document.getElementById("year").innerHTML = createYear;
    
    var calendar = document.getElementById("calendar");
    var lang = calendar.getAttribute('data-lang');
    
    var months = "";
    var days = "";
    
    var monthDefault = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    
    var dayDefault = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    
    if (lang == "en") {
        months = monthDefault;
        days = dayDefault;
    } else if (lang == "id") {
        months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        days = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
    } else if (lang == "fr") {
        months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
        days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
    } else {
        months = monthDefault;
        days = dayDefault;
    }
    
    
    var $dataHead = "<tr>";
    for (dhead in days) {
        $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
    }
    $dataHead += "</tr>";
    
    // alert($dataHead);
    document.getElementById("thead-month").innerHTML = $dataHead;
    
    
    monthAndYear = document.getElementById("monthAndYear");

    showCalendar(currentMonth, currentYear);
    
    
    
    function next() {
        currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
        currentMonth = (currentMonth + 1) % 12;
        showCalendar(currentMonth, currentYear);
    }
    
    function previous() {
        currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
        currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
        showCalendar(currentMonth, currentYear);
    }
    
    function jump() {
        currentYear = parseInt(selectYear.value);
        currentMonth = parseInt(selectMonth.value);
        showCalendar(currentMonth, currentYear);
    }
    
    function showCalendar(month, year) {
    
        var firstDay = ( new Date( year, month ) ).getDay();
    
        tbl = document.getElementById("calendar-body");
    
        
        tbl.innerHTML = "";
    
        
        // monthAndYear.innerHTML = months[month] + " " + year;
        selectYear.value = year;
        selectMonth.value = month;
    
        // creating all cells
        var date = 1;
        for ( var i = 0; i < 6; i++ ) {
            
            var row = document.createElement("tr");
    
            
            for ( var j = 0; j < 7; j++ ) {
                if ( i === 0 && j < firstDay ) {
                    cell = document.createElement( "td" );
                    cellText = document.createTextNode("");
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                } else if (date > daysInMonth(month, year)) {
                    break;
                } else {
                    cell = document.createElement("td");
                    cell.setAttribute("data-date", date);
                    cell.setAttribute("data-month", month + 1);
                    cell.setAttribute("data-year", year);
                    cell.setAttribute("data-month_name", months[month]);
                    cell.addEventListener('click',function(e){
                        //console.log(this.dataset)
                        const d = parseInt(this.dataset.date)
                        const m = parseInt(this.dataset.month)-1
                        const y = parseInt(this.dataset.year)
                        console.log(e.target.dataset)
                        const date = new Date()
                           selectedDay.setDate(d)
                        selectedDay.setMonth(m)
                        selectedDay.setFullYear(y)
                        jump()
                        callback(seanceId,selectedDay.toISOString().split('T')[0])
                        
                    })
                    cell.className = "date-picker";
                    cell.innerHTML = "<span>" + date + "</span>";
                    
                    if ( date === selectedDay.getDate() && year === selectedDay.getFullYear() && month === selectedDay.getMonth() ) {
                        cell.className = "date-picker selected";
                    }
                    row.appendChild(cell);
                    date++;
                }
    
    
            }
    
            tbl.appendChild(row);
        }
    
    }
    
    function daysInMonth(iMonth, iYear) {
        return 32 - new Date(iYear, iMonth, 32).getDate();
    }
}









}