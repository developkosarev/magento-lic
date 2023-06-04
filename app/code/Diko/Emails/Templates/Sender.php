<?php
declare(strict_types=1);

namespace Diko\Emails\Templates;

class Sender
{
    private function sendEmail(string $email): bool
    {
        $transport = $this->transportBuilder
            ->setTemplateIdentifier($this->emailTemplatePath)
            ->setTemplateOptions(['area' => Area::AREA_FRONTEND, 'store' => $this->storeId])
            ->setTemplateVars($this->templateVars)
            ->addTo($email);

        $result = true;
        try {
            $transport
                ->setFromByScope($this->emailIdentityPath)
                ->getTransport()
                ->sendMessage();
        } catch (\Exception $e) {
            $this->logger->critical($e->getMessage());
            $result = false;
        }

        $this->stateInterface->resume();

        return $result;
    }
}
