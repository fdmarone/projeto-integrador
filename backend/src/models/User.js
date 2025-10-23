const { DataTypes, Model } = require('sequelize');
const sequelize = require('../config/database');

class User extends Model {}

User.init({
  id: {
    type: DataTypes.UUID,
    primaryKey: true,
    defaultValue: DataTypes.UUIDV4
  },
  name: { type: DataTypes.STRING },
  email: { type: DataTypes.STRING, allowNull: false, unique: true },
  passwordHash: { type: DataTypes.STRING, allowNull: false },
  disabilities: { type: DataTypes.JSON, defaultValue: [] }, // [{type:"visual", severity:"high"}, ...]
  preferences: { type: DataTypes.JSON, defaultValue: {} },
  accessibilityNeeds: { type: DataTypes.JSON, defaultValue: [] }, // ["large_text","remappable_keys"]
  isAdmin: { type: DataTypes.BOOLEAN, defaultValue: false }
}, {
  sequelize,
  modelName: 'user',
  tableName: 'users',
  timestamps: true
});

module.exports = User;