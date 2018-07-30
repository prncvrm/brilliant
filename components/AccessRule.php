<?php
 
namespace app\components;
 
use app\models\Users;
class AccessRule extends \yii\filters\AccessRule {
 
    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role == '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } elseif ($role == Users::ROLE_USER) {
                if (!$user->getIsGuest()) {
                    return true;
                }
            } elseif (!$user->getIsGuest() && $role == $user->identity->AccessLevel) {
                return true;
            }
        }
 
        return false;
    }
}