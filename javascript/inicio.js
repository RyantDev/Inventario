

function changeTab(tabIndex) {
   
   console.log('tab index = ' + tabIndex);
   
    const tabContents = document.querySelectorAll('.tab-content');
    const tabButtons = document.querySelectorAll('.tab-button');


 



    tabContents.forEach((tabContent, index) => {
        if (index === tabIndex) {
            tabContent.classList.add('active');
        } else {
            tabContent.classList.remove('active');
        }
    });

    tabButtons.forEach((tabButton, index) => {
        if (index === tabIndex) {
            tabButton.style.backgroundColor = '#292929';
            
        } else {
            tabButton.style.backgroundColor = '#000000';
        }
    });
    
}



