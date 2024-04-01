// 确保DOM内容加载完成后再执行脚本
document.addEventListener('DOMContentLoaded', () => {
    const chartData = {
        labels: ["Transportation", "Energy", "Diet"],
        data: [50, 70, 20],
    };

    const generateAdvice = () => {
        const adviceDataElement = document.querySelector('.advice-data');
        if (!adviceDataElement) {
            console.error('The advice data element was not found!');
            return;
        }

        adviceDataElement.innerHTML = '';

        chartData.labels.forEach((category, index) => {
            const percentage = chartData.data[index];
            let adviceMessages = [];

            if (category.toLowerCase() === 'transportation') {
                if (percentage >= 70) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Transportation - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "Use advanced information technology to improve traffic efficiency and reduce unnecessary emissions.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                } else if (percentage >= 50) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Transportation - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "Implement low-carbon transport policies: for example, congestion charges or carbon taxes.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                } else if (percentage >= 20) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Transportation - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "We will encourage the purchase and use of electric and hybrid vehicles and other energy-saving and environmentally friendly vehicles.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                } else if (percentage >= 10) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Transportation - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "Encourage the use of public transport, such as buses and subways.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                }
            } else if (category.toLowerCase() === 'energy') {
                if (percentage >= 70) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Energy - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "Including electric vehicles, electric buses and electric bicycles to reduce the consumption of traditional fossil fuels.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                } else if (percentage >= 50) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Energy - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "A carbon tax or carbon trading system that makes carbon emissions costless and incentivizes businesses and individuals to reduce carbon emissions.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                } else if (percentage >= 20) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Energy - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "Encourage the adoption of green building standards, such as better insulation, solar water heaters, etc., to reduce building energy consumption.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                } else if (percentage >= 10) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Energy - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "Improve energy efficiency and reduce energy waste through the use of energy-saving light bulbs and high-efficiency home appliances.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                }
                // 同理添加能源的其他条件
            } else if (category.toLowerCase() === 'diet') {
                if (percentage >= 70) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Diet - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "Increase public awareness of the carbon footprint of food production through education and social campaigns to encourage the adoption of more environmentally friendly eating habits.";              
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                } else if (percentage >= 50) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Diet - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "Drastically reduce food waste by planning meal purchases, storing food properly, and using surplus food.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                } else if (percentage >= 20) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Diet - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "Choose foods that are certified organic and sustainably produced, which tend to be more environmentally friendly and use fewer fossil fuels and chemicals.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                } else if (percentage >= 10) {
                    const categoryElement = document.createElement("p");
                    categoryElement.innerHTML = `<strong>Diet - ${percentage}%:</strong>`; 
                    adviceDataElement.appendChild(categoryElement);
                
                    const adviceElement = document.createElement("p");
                    adviceElement.textContent = "By reducing the consumption of red meat (especially beef and lamb), switch to chicken and fish, as well as plant-based protein sources such as beans and soy products.";
                    adviceElement.className = "advice-text";
                    adviceDataElement.appendChild(adviceElement);
                }
            }

            adviceMessages.forEach((message) => {
                const p = document.createElement("p");
                p.textContent = message;
                adviceDataElement.appendChild(p);
            });
        });
    };

    // 定义populateUl函数
    const populateUl = () => {
        const ul = document.querySelector(".programming-stats .details ul");
        ul.innerHTML = ''; // 清空旧的列表项
        chartData.labels.forEach((label, index) => {
            const li = document.createElement("li");
            li.innerHTML = `${label}: <span class='percentage'>${chartData.data[index]}%</span>`;
            ul.appendChild(li);
        });
    };

    // 定义updateChartData函数
    const updateChartData = (newData) => {
        chartData.data = newData;
        generateAdvice();

    };

    // 创建饼图
    const ctx = document.querySelector(".my-chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: chartData.labels,
            datasets: [{
                label: "Carbon Footprint",
                data: chartData.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)', 
                ], // 添加颜色

                
                
            }],
        },
        options: {
            borderWidth: 10,
            borderRadius: 2,
            hoverBorderWidth: 0,
            plugins: {
                legend: {
                    display: false,
                },
            },
        },
    });

    populateUl();
    generateAdvice();

    // 如果你的表单用来更新数据，添加事件监听
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            // 获取表单数据并更新图表
            // 这里你需要根据实际表单元素的name属性来获取值
            const newData = [
                event.target.elements.transportation.value, 
                event.target.elements.energy.value, 
                event.target.elements.diet.value
            ].map(Number);
            updateChartData(newData);
        });
    }
});