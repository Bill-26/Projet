import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

const handleClick = () => {
  axios.post('classement.php', { action: 'modifier_variable' })
    .then(response => {
      console.log(response.data); // Traitez la réponse ici si nécessaire
    })
    .catch(error => {
      console.error(error);
    });
};

const MonComposant = () => {
  return (
    <button onClick={handleClick}>Cliquez-moi</button>
  );
};

ReactDOM.render(<MonComposant />, document.getElementById('root'));
