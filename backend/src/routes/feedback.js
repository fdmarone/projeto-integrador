const express = require('express');
const router = express.Router();
const fbCtrl = require('../controllers/feedbackController');
const auth = require('../middleware/auth');

router.post('/', auth, fbCtrl.sendFeedback);

module.exports = router;