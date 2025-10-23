const express = require('express');
const { body } = require('express-validator');
const router = express.Router();
const authCtrl = require('../controllers/authController');

router.post('/register', [
  body('email').isEmail(),
  body('password').isLength({ min: 6 })
], authCtrl.register);

router.post('/login', [
  body('email').isEmail(),
  body('password').isLength({ min: 1 })
], authCtrl.login);

module.exports = router;