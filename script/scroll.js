const observer = new IntersectionObserver((entries)=>{
    entries.forEach((entry) => {
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('show');
        } else{
            entry.target.classList.remove('show');
        }
    });
});



const hiddenElement = document.querySelectorAll('.hidden');
hiddenElement.forEach((el) => observer.observe(el));

const hiddenElement2 = document.querySelectorAll('.hidden2');
hiddenElement2.forEach((el) => observer.observe(el));

const hiddenElement3 = document.querySelectorAll('.hidden3');
hiddenElement3.forEach((el) => observer.observe(el));