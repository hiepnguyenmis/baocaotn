var initialState = [
    {
        id: 1,
        name: 'Nguyen van hiep',
        gender:'nam',
        address:'Binh duong',
        status: true
    },
    {
        id: 2,
        name: 'Nguyen anh hao',
        gender:'nam',
        address:'Dong nai',
        status: false
    },
    {
        id: 3,
        name: 'Nguyen anh hung',
        gender:'nam',
        address:'Soc trang',
        status:true
    }
];

const employees = (state =initialState, action)=>{
    switch(action.type){
        default:return[...state];
    }
};

export default employees;