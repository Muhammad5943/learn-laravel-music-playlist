import React from 'react';
import ReactDOM from 'react-dom';
import swal from 'sweetalert';

function Delete(props) {
    const destroy = (e) => {
        const afterDeleted = e.currentTarget.parentNode.parentNode.parentNode
        // console.log(afterDeleted);

        swal('Are You sure ?', {
            buttons: ["No", "Yes"]
        }).then((value) => {
            if (value == true) {
                axios.delete(props.endpoint).then((response) => {
                    // console.log(response.data);
                    afterDeleted.remove()
                })
            }
        })
    }

    return (
        <button onClick={destroy} className="btn btn-danger">Delete</button>
    );
}

export default Delete;

if (document.querySelectorAll('.delete')) {
    const deleteNodes = document.querySelectorAll('.delete')
    deleteNodes.forEach((item) => {
        const endpoint = item.getAttribute('endpoint')
        ReactDOM.render(<Delete endpoint={endpoint} />, item);
    })
}
