<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260620215810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE INDEX IDX_APPOINTMENT_STATUS ON appointment (status)');
        $this->addSql('CREATE INDEX IDX_APPOINTMENT_STARTS_AT ON appointment (starts_at)');
        $this->addSql('DROP INDEX uniq_ba5ae01d989d9b62');
        $this->addSql('CREATE INDEX IDX_BLOG_POST_LOCALE_STATUS ON blog_post (locale, status)');
        $this->addSql('CREATE INDEX IDX_BLOG_POST_PUBLISHED_AT ON blog_post (published_at)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BLOG_POST_LOCALE_SLUG ON blog_post (locale, slug)');
        $this->addSql('DROP INDEX idx_5e498e828565851');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BOOKING_RULE_ESTABLISHMENT ON booking_rule (establishment_id)');
        $this->addSql('CREATE INDEX IDX_CATEGORY_LANG_TYPE ON category (lang, type)');
        $this->addSql('CREATE INDEX IDX_CATEGORY_ACTIVE ON category (is_active)');
        $this->addSql('CREATE INDEX IDX_ESTABLISHMENT_STATUS ON establishment (status)');
        $this->addSql('CREATE INDEX IDX_ESTABLISHMENT_COUNTRY_ACTIVITY ON establishment (country_code, activity_type)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EST_TRANS_LOCALE ON establishment_translation (establishment_id, locale)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_LOYALTY_ACCOUNT_CLIENT_PROGRAM ON loyalty_account (client_id, loyalty_program_id)');
        $this->addSql('ALTER TABLE professional_account ADD registration_number VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE professional_account DROP siret');
        $this->addSql('CREATE INDEX IDX_REVIEW_STATUS ON review (status)');
        $this->addSql('DROP INDEX uniq_e8dca6f1989d9b62');
        $this->addSql('CREATE INDEX IDX_SEO_PAGE_LOCALE_TYPE ON seo_page (locale, page_type)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_SEO_PAGE_LOCALE_TYPE_SLUG ON seo_page (locale, page_type, country_code, slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_SRV_CATEGORY_EST_SLUG ON service_category (establishment_id, slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_SRV_TRANS_LOCALE ON service_translation (service_id, locale)');
        $this->addSql('CREATE INDEX IDX_USER_TYPE ON "user" (type)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_APPOINTMENT_STATUS');
        $this->addSql('DROP INDEX IDX_APPOINTMENT_STARTS_AT');
        $this->addSql('DROP INDEX IDX_BLOG_POST_LOCALE_STATUS');
        $this->addSql('DROP INDEX IDX_BLOG_POST_PUBLISHED_AT');
        $this->addSql('DROP INDEX UNIQ_BLOG_POST_LOCALE_SLUG');
        $this->addSql('CREATE UNIQUE INDEX uniq_ba5ae01d989d9b62 ON blog_post (slug)');
        $this->addSql('DROP INDEX UNIQ_BOOKING_RULE_ESTABLISHMENT');
        $this->addSql('CREATE INDEX idx_5e498e828565851 ON booking_rule (establishment_id)');
        $this->addSql('DROP INDEX IDX_CATEGORY_LANG_TYPE');
        $this->addSql('DROP INDEX IDX_CATEGORY_ACTIVE');
        $this->addSql('DROP INDEX IDX_ESTABLISHMENT_STATUS');
        $this->addSql('DROP INDEX IDX_ESTABLISHMENT_COUNTRY_ACTIVITY');
        $this->addSql('DROP INDEX UNIQ_EST_TRANS_LOCALE');
        $this->addSql('DROP INDEX UNIQ_LOYALTY_ACCOUNT_CLIENT_PROGRAM');
        $this->addSql('ALTER TABLE professional_account ADD siret VARCHAR(32) DEFAULT NULL');
        $this->addSql('ALTER TABLE professional_account DROP registration_number');
        $this->addSql('DROP INDEX IDX_REVIEW_STATUS');
        $this->addSql('DROP INDEX IDX_SEO_PAGE_LOCALE_TYPE');
        $this->addSql('DROP INDEX UNIQ_SEO_PAGE_LOCALE_TYPE_SLUG');
        $this->addSql('CREATE UNIQUE INDEX uniq_e8dca6f1989d9b62 ON seo_page (slug)');
        $this->addSql('DROP INDEX UNIQ_SRV_CATEGORY_EST_SLUG');
        $this->addSql('DROP INDEX UNIQ_SRV_TRANS_LOCALE');
        $this->addSql('DROP INDEX IDX_USER_TYPE');
    }
}
