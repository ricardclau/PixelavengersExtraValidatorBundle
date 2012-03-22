<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\FR;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class SocialSecurityValidator extends ConstraintValidator
{
    /**
     * @see http://www.developpez.net/forums/d677820/php/langage/regex/verification-numero-securite-sociale/
     * @see http://fr.wikipedia.org/wiki/Num%C3%A9ro_de_s%C3%A9curit%C3%A9_sociale_en_France#Signification_des_chiffres_du_NIR
     */
    const PATTERN = '/^(?<sexe>[1278])(?<annee>[0-9]{2})(?<mois>0[1-9]|1[0-2]|20)(?<departement>[02][1-9]|2[AB]|[1345678][0-9]|9[012345789])(?<numcommune>[0-9]{3})(?<numacte>00[1-9]|0[1-9][0-9]|[1-9][0-9]{2})(?<clef>0[1-9]|[1-8][1-9]|9[1-7])?$/x';


    /**
     * {@inheritDoc}
     */
    public function isValid($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return true;
        }

        if (!is_scalar($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            throw new UnexpectedTypeException($value, 'string');
        }

        $value = (string) $value;

        if (!preg_match(static::PATTERN, $value, $matches)) {
            $this->setMessage($constraint->message, array('{{ value }}' => $value));

            return false;
        }

        if (!$this->validateFRSocialSecurityNumber($value, $matches)) {
            $this->setMessage($constraint->message);

            return false;
        }

        return true;
    }

    /**
     * Validates FR Social Security Number
     * @see http://www.developpez.net/forums/d677820/php/langage/regex/verification-numero-securite-sociale/
     * @see http://fr.wikipedia.org/wiki/Num%C3%A9ro_de_s%C3%A9curit%C3%A9_sociale_en_France#Signification_des_chiffres_du_NIR
     *
     * @param string $value
     * @param array $matches from Regular expression
     * @return bool
     */
    private function validateFRSocialSecurityNumber($value, $matches)
    {
        if (empty($matches['clef'])) {
            return false;
        }

        $aChecker = substr($value, 0, 13);

        /**
         * Traitement des cas des personnes nées hors métropole ou en corse
         */
        if ($matches['departement'] == '2A') {
            $aChecker = bcsub(str_replace('A', '0', substr($value, 0, 13)), '1000000');
        } elseif ($matches['departement'] == '2B') {
            $aChecker = bcsub(str_replace('B', '0', substr($value, 0, 13)), '2000000');
        } elseif ($matches['departement'] === '97' || $matches['departement'] === '98') {
            $matches['numcommune'] = substr($matches['numcommune'], 1, 2) ;
        }

        /**
         * Pays inconnu
         */
        if ($matches['numcommune'] > '990') {
            return false;
        }

        return ($matches['clef'] === bcsub('97', bcmod($aChecker, '97')));
    }
}