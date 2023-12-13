


document.addEventListener('DOMContentLoaded', function() {
        updateCurrentWeekOnLoad(); 
      });

      document.getElementById('datePicker').addEventListener('input', function() {
        updateCurrentWeek();
      });

      function updateCurrentWeekOnLoad() {
        var selectedDate = new Date(document.getElementById('datePicker').value) || new Date();
        updateHiddenDateFields(selectedDate);
        updateCurrentWeek();
      }

      function updateCurrentWeek() {
        var days = document.querySelectorAll('.date-num');
        var selectedDate = new Date(document.getElementById('datePicker').value || new Date()); 
        var currentDayOfWeek = selectedDate.getDay();
        var monday = selectedDate.getDate() - currentDayOfWeek + 1;

        days.forEach(function(day, index) {
          var dayValue = monday + index;
          day.textContent = dayValue;

          if (dayValue < 1) {
            var lastDayOfPreviousMonth = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), 0).getDate();
            day.textContent = lastDayOfPreviousMonth + dayValue;
          } else if (dayValue > new Date(selectedDate.getFullYear(), selectedDate.getMonth() + 1, 0).getDate()) {
            day.textContent = dayValue - new Date(selectedDate.getFullYear(), selectedDate.getMonth() + 1, 0).getDate();
          }
        });

        updateHiddenDateFields(monday, days.length);
      }

      function updateHiddenDateFields(monday, daysCount) {
        var hiddenDateFields = document.querySelectorAll('.hiddenDateField');
        var currentDate = new Date(document.getElementById('datePicker').value || new Date());
        
        hiddenDateFields.forEach(function(hiddenDateField, index) {
          var currentDay = new Date(currentDate);
          currentDay.setDate(monday + index);

          updateHiddenDateField(hiddenDateField, currentDay);
        });
      }

      function updateHiddenDateField(hiddenDateField, date) {
        var formattedDate = date.getFullYear() + '-' + pad((date.getMonth() + 1), 2) + '-' + pad(date.getDate(), 2);
        hiddenDateField.value = formattedDate;
      }

      function pad(number, length) {
        var str = '' + number;
        while (str.length < length) {
          str = '0' + str;
        }
        return str;
      }



      /* function getNextWeekday(currentDate, targetDay) {
          const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

          const currentDay = currentDate.getDay();
          const daysUntilTarget = (targetDay - currentDay + 7) % 7;

          const nextWeekday = new Date(currentDate);
          nextWeekday.setDate(currentDate.getDate() + daysUntilTarget);

          return nextWeekday;
      }

      const today = new Date();
      const nextMonday = getNextWeekday(today, 1);

      document.getElementById("date-num1").innerHTML = nextMonday.getDate();*/