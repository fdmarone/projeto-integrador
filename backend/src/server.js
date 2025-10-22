import sequelize from './config/database.js';

sequelize.authenticate()
  .then(() => console.log('Conexão com o MySQL estabelecida com sucesso!'))
  .catch(err => console.error('Erro ao conectar no MySQL:', err));
